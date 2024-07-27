<?php

namespace App\Http\Resources\Api\Settings;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'is_active'  => $this->is_active,
            'start_date' => $this->start_date,
            'end_date'   => $this->end_date,
            'link'       => $this->link,
            'image'      => $this->image,
        ];
    }
}
