<?php

namespace App\Http\Resources\Api\Settings;

use Illuminate\Http\Resources\Json\JsonResource;

class RegionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
        ];
    }
}
