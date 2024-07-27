<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\JsonResource;

class MessagesResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'is_sender'         => $this->is_sender,
            'body'              => $this->originalMessage->body??'',
            'type'              => $this->originalMessage->type??'',
            'duration'          => $this->originalMessage->duration??'0.0',
            'name'              => $this->originalMessage->name??'',
            'created_at'        => $this->originalMessage->created_at->diffForHumans()
        ];
    }
}