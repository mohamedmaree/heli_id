<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\JsonResource;

class MembersResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->memberable_id,
            'type'        => $this->memberable_type,
            'name'        => ($this->memberable->name)??'',
            'image'       => ($this->memberable->image)??''
        ];
    }
}