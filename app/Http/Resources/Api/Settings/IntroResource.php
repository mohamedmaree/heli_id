<?php

namespace App\Http\Resources\Api\Settings;

use Illuminate\Http\Resources\Json\JsonResource;

class IntroResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'image'       => $this->image,
        ];
    }
}
