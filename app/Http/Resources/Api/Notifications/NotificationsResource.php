<?php

namespace App\Http\Resources\Api\Notifications;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationsResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'type'       => $this->data['type'],
            'title'      => $this->title,
            'body'       => $this->body,
            'data'       => $this->data,
            'created_at' => $this->created_at->diffForHumans(),
            // 'created_at' => $this->created_at->format('Y-m-d'),
        ];
    }
}
