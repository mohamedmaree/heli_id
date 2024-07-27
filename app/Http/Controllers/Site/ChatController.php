<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use Auth;
use App\Services\ChatService;
use App\Traits\ResponseTrait;

class ChatController extends Controller
{
    use ResponseTrait;

    public $chat;

    public function __construct(ChatService $chat)
    {
        $this->chat = $chat;
    }
    
    public function getChatRoom($id)
    {
        // TODO: use Auth::user() instead of this test data
        $user    = User::find(101);

        $room    = Room::find($id);
        if (!$room) {
            return $this->failMsg(__('site.noRoom'));
        }
                
        $this->chat->seeRoomMessages($room, $user);
        $messages = $this->chat->getRoomMessagesResource($room,  $user);

        $members = $this->chat->getOtherRoomMembers($room,  $user);

        return view('site.chat-example', compact('user', 'room','messages','members'));
    }

    public function uploadChatFile(Request $request){
        $room = Room::find($request['room_id']);
        $file = $this->chat->uploadRoomFile($room, auth()->user(), $request->file);
        return $this->successData(['file_name' => $file['file_name'],'file_url' => $file['file_url']]);
    }
    
}
