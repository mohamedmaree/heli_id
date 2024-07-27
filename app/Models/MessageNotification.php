<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageNotification extends Model {

  protected $fillable = [
    'room_id',
    'message_id',
    'userable_id',
    'userable_type',
    'is_seen',
    'is_sender',
    'is_flagged',
  ];

  public function originalMessage() {
    return $this->belongsTo(Message::class, 'message_id');
  }

}
