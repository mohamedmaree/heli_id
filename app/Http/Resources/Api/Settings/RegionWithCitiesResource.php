<?php

namespace App\Http\Resources\Api\Settings;

use App\Http\Resources\Api\Settings\CityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RegionWithCitiesResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'     => $this->id,
            'name'   => $this->name,
            'cities' => CityResource::collection($this->cities),
        ];
    }
}
