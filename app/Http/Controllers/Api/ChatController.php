<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Chat\PrivateRoomRequest;
use App\Http\Resources\Chat\RoomResource;
use App\Http\Resources\Chat\MembersResource;
use App\Http\Resources\Chat\MessagesResource;
use App\Http\Resources\Chat\RoomsResource;
use App\Http\Resources\Chat\MessagesCollection;
use App\Models\MessageNotification;
use App\Models\Room;
use App\Services\ChatService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class ChatController extends Controller {
  use ResponseTrait;
  public $chat;

  /**
   * add chat services here
   */

  public function __construct(ChatService $chat) {
    $this->chat = $chat;
  }

  public function createRoom() {
    // TODO: Change the type to the appropriate type for the conversation --> change 'order'
    $room = $this->chat->createRoom(auth()->user(), 'order');
    return $this->successData( $room);
  }

  public function createPrivateRoom(PrivateRoomRequest $request) {
    $model      = 'App\\Models\\' . $request->memberable_type;
    $memberable = $model::findOrFail($request->memberable_id);
    // TODO: Change the type to the appropriate type for the conversation --> change 'advertising'
    $room       = $this->chat->createPrivateRoom(auth()->user(), 'advertising', $memberable);
    
    $members    = $this->chat->getOtherRoomMembers($room, auth()->user());
    
    $this->chat->seeRoomMessages($room, auth()->user());
    $roomMessagesQuery = $this->chat->getRoomMessages($room, auth()->user());

    return $this->successData([
      'room' => new RoomResource($room->refresh()),
      'members'=> MembersResource::collection($members),
      'messages'=> new MessagesCollection($roomMessagesQuery)
    ]);
  }

  public function getRoomMembers(Room $room) {
    $members = $this->chat->getRoomMembers($room, auth()->user());
    return $this->successData( $members);
  }

  public function joinRoom(Room $room) {
    $this->chat->joinRoom($room, auth()->user());
    return $this->successMsg();
  }

  public function leaveRoom(Room $room) {
    $this->chat->leaveRoom($room, auth()->user());
    return $this->successMsg();
  }

  public function sendMessage(Request $request, Room $room) {
    $senderLastMessage = $this->chat->storeMessage($room, auth()->user(), $request->message);
    return $this->successData( $senderLastMessage);
  }

  public function uploadRoomFile(Request $request, Room $room) {
    $file = $this->chat->uploadRoomFile($room, auth()->user(), $request->file);
    return $this->successData(['file_name' => $file['file_name'],'file_url'=>$file['file_url']]);
  }

  public function getRoomMessages(Room $room) {
    $members = $this->chat->getOtherRoomMembers($room, auth()->user());
    
    $this->chat->seeRoomMessages($room, auth()->user());
    $roomMessagesQuery = $this->chat->getRoomMessages($room, auth()->user());

    return $this->successData([
      'room' => new RoomResource($room->refresh()),
      'members'=> MembersResource::collection($members),
      'messages'=> new MessagesCollection($roomMessagesQuery)
    ]);
  }

  public function getRoomUnseenMessages(Room $room) {
    $count = $this->chat->getRoomUnseenMessagesCount($room, auth()->user());
    return $this->successData( $count);
  }

  public function getMyRooms() {
    $rooms = $this->chat->getUserRooms(auth()->user());
    return $this->successData([
      'rooms' => RoomsResource::collection($rooms)
    ]);
  }

  public function deleteMessageCopy(MessageNotification $message) {
    // TODO: fix this
    $this->chat->deleteMessageCopy($message, auth()->user());
    return $this->successMsg(trans('apis.deleted'));
  }

}
