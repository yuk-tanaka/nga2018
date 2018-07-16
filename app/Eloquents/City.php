<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class City extends Model
{
    use CommonScopes;

    /** @var array */
    protected $fillable = [
        'name',
    ];

    /** @var bool */
    public $timestamps = false;

    /** @var int id */
    const OSAKA = 1;
    /** @var int id */
    const KOBE = 2;
    /** @var int id */
    const KYOTO = 3;

    /** @var int[] */
    const KANSAI = [1, 2, 3];

    /**
     * @return HasMany
     */
    public function areas(): HasMany
    {
        return $this->hasMany(Area::class);
    }

    /**
     * @return HasManyThrough
     */
    public function shops(): HasManyThrough
    {
        return $this->hasManyThrough(Shop::class, Area::class);
    }
}
