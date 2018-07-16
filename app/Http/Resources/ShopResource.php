<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
{
    /** @var string */
    const GMAP_SEARCH_URL = '//maps.google.co.jp/maps/search/';

    /**
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'area' => new AreaResource($this->area),
            'brewery' => new BreweryResource($this->brewery),
            'name' => $this->name,
            'address' => $this->address,
            'tel' => $this->tel,
            'description' => $this->description ?? null,
            'web' => $this->web ?? null,
            'twitter' => $this->twitter ?? null,
            'facebook' => $this->facebook ?? null,
            'tabelog' => $this->tabelog ?? null,
            'opened_at' => $this->opened_at->format('H:i'),
            'opened_at_hour' => $this->opened_at->format('H'), //date instanceに使用
            'opened_at_min' => $this->opened_at->format('i'),
            'closed_at' => $this->closed_at->format('H:i'),
            'closed_at_hour' => $this->closed_at->format('H'),
            'closed_at_min' => $this->closed_at->format('i'),
            'business_hours' => $this->business_hours,
            'gmap_url' => self::GMAP_SEARCH_URL . $this->address,
            'show_url' => route('shops.show', $this->id),
            'distance' => $this->distance, //nullable
        ];
    }
}
