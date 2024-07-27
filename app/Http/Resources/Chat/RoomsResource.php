<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Chat\RoomResource;
use App\Http\Resources\Chat\MembersResource;
use App\Http\Resources\Chat\MessagesResource;
use App\Services\ChatService;

class RoomsResource extends JsonResource
{    
    public function toArray($request)
    {
        $chat = new ChatService();
        $members = $chat->getOtherRoomMembers($this, auth()->user());

        return [
            'id'                        => $this->id,
            'members'                   => MembersResource::collection($members),
            'last_message_body'         => $this->lastOriginalMessage->body??'',
            'last_message_created_at'   => $this->lastOriginalMessage->created_at->diffForHumans()
        ];
    }
}