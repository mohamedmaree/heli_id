<?php

namespace App\Http\Resources\Api\Settings;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'image'       => $this->image,
            'is_active'   => $this->is_active,
            'parent_id'   => $this->when($this->parent_id, $this->parent_id),
            'parent_name' => $this->when($this->parent_id, $this->parent->name ?? ''),
        ];
    }
}
