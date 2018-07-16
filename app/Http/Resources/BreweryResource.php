<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BreweryResource extends JsonResource
{
    /**
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'company_name' => $this->company_name,
            'prefecture' => $this->prefecture,
            'web' => $this->web ?? null,
            'twitter' => $this->twitter ?? null,
            'facebook' => $this->facebook ?? null,
        ];
    }
}
