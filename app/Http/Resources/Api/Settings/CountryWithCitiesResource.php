<?php

namespace App\Http\Resources\Api\Settings;

use App\Http\Resources\Api\Settings\CityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryWithCitiesResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'     => $this->id,
            'name'   => $this->name,
            'key'    => $this->key,
            'cities' => CityResource::collection($this->cities),
        ];
    }
}
