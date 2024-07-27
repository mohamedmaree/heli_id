<?php

namespace App\Http\Resources\Api\Settings;

use App\Http\Resources\Api\Settings\RegionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryWithRegionsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'     => $this->id,
            'name'   => $this->name,
            'key'    => $this->key,
            'regions' => RegionResource::collection($this->regions),
        ];
    }
}
