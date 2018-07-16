<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Area extends Model
{
    use CommonScopes;

    /** @var array */
    protected $casts = [
        'city_id' => 'integer',
    ];

    /** @var array */
    protected $fillable = [
        'city_id',
        'name',
        'color',
    ];

    /** @var bool */
    public $timestamps = false;

    /**
     * 大阪
     */
    /** @var int id */
    const UMEDA = 1;
    /** @var int id */
    const TENMA = 2;
    /** @var int id */
    const FUKUSHIMA = 3;
    /** @var int id */
    const MIYAKOJIMA = 4;
    /** @var int id */
    const HONMACHI = 5;
    /** @var int id */
    const NANBA = 6;
    /** @var int id */
    const TSURUHASHI = 7;

    /**
     * 神戸
     */
    /** @var int id */
    const SANNOMIYA = 8;
    /** @var int id */
    const MOTOMACHI = 9;

    /**
     * 京都
     */
    /** @var int id */
    const KARASUMA = 10;
    /** @var int id */
    const SAI = 11;

    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
