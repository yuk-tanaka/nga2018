<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;

class Shop extends Model
{
    use CommonScopes;

    protected $appends = [
        'business_hours',
    ];

    /** @var array */
    protected $casts = [
        'area_id' => 'integer',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    /** @var array */
    protected $dates = [
        'opened_at',
        'closed_at',
        'created_at',
        'updated_at',
    ];

    /** @var array */
    protected $fillable = [
        'area_id',
        'name',
        'address',
        'latitude',
        'longitude',
        'opened_at',
        'closed_at',
        'tel',
        'description',
        'web',
        'twitter',
        'facebook',
        'tabelog',
    ];

    /** @var string */
    const BUSINESS_HOUR_DELIMITER = '-';

    /**
     * @return BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * @return HasOne
     */
    public function brewery(): HasOne
    {
        return $this->hasOne(Brewery::class);
    }

    /**
     * 営業時間
     * @return string
     */
    public function getBusinessHoursAttribute(): string
    {
        return $this->opened_at->format('H:i')
            . self::BUSINESS_HOUR_DELIMITER
            . $this->closed_at->format('H:i');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeKansai(Builder $query): Builder
    {
        return $query->whereHas('area', function (Builder $query) {
            $query->whereIn('city_id', City::KANSAI);
        });
    }

    /**
     * @param Builder $query
     * @param array|null $favorites
     * @return Builder
     */
    public function scopeFavorites(Builder $query, ?array $favorites): Builder
    {
        if (empty($favorites)) {
            return $query;
        }

        return $query->whereIn('id', $favorites);
    }

    /**
     * 都市、エリアからのRequest経由による絞り込み
     * @param Builder $query
     * @param int[]|null $cities
     * @param int[]|null $areas
     * @return Builder
     */
    public function scopeRefineSearch(Builder $query, ?array $cities, ?array $areas): Builder
    {
        if (is_null($cities) && is_null($areas)) {
            return $query;
        }

        //area指定がある場合はcityによるサブクエリ問い合わせは行わない
        if (!empty($areas)) {
            return $query->whereIn('area_id', $areas);
        }

        return $query->whereHas('area', function (Builder $query) use ($cities) {
            $query->whereIn('city_id', $cities);
        });
    }

    /**
     * @param int $limit 取得件数
     * @return Collection
     */
    public function fetchNearbyShops(int $limit = 4): Collection
    {
        return $this->calcNearbyShops($this->latitude, $this->longitude)
            ->where('id', '!=', $this->id)
            ->limit($limit)
            ->with(['area', 'brewery'])
            ->get();
    }

    /**
     * 現在地から近い店を取得
     * 現在地座標はGeolocation APIで求める
     * @param float $latitude
     * @param float $longitude
     * @param int $limit
     * @return Collection
     */
    public function fetchNearbyShopsFromCurrentLocation(float $latitude, float $longitude, int $limit = 10): Collection
    {
        return $this->calcNearbyShops($latitude, $longitude)
            ->limit($limit)
            ->with(['area', 'brewery'])
            ->get();
    }

    /**
     * 距離近い店を計算するSQL
     * 参考元：https://qiita.com/naotarou/items/628952e68fef059c6b1a
     * ↑記載SQLから *1000(メートル変換)、丸め処理を追加している
     * @param float $latitude
     * @param float $longitude
     * @return Builder
     */
    private function calcNearbyShops(float $latitude, float $longitude): Builder
    {
        $sql = <<<SQL
( 
    TRUNCATE(6371 * ACOS( 
      COS(RADIANS({$latitude})) * COS(RADIANS(latitude)) * COS(RADIANS(longitude) - RADIANS({$longitude}))
       + SIN(RADIANS({$latitude})) * SIN(RADIANS(latitude))
       ) * 1000, 0)
    ) as distance
SQL;

        return (new self())->query()
            ->select(array_keys($this->attributes))
            ->selectRaw($sql)
            ->orderBy('distance', 'asc');
    }
}
