<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Brewery extends Model
{
    use CommonScopes;

    /** @var array */
    protected $casts = [
        'shop_id' => 'integer',
    ];

    /** @var array */
    protected $fillable = [
        'shop_id',
        'name',
        'company_name',
        'prefecture',
        'web',
        'twitter',
        'facebook',
    ];

    /**
     * @return BelongsTo
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }
}
