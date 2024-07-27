<?php

namespace App\Http\Resources\Api\Settings;

use Illuminate\Http\Resources\Json\JsonResource;

class AppHomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'           => $this->id ,
            'title'        => $this->title,
            'description'  => $this->description,
            'type'         => $this->type,
            'records'      => $this->records(),
            'display_type' => $this->display_type,
            'grid_columns_count' => $this->grid_columns_count,
        ];

    }


}
