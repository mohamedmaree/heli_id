<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model {

  //! define type consts here

  protected $fillable = [
    'private',
    'type',
    'order_id',
    'createable_id',
    'createable_type',
    'last_message_id',
  ];

  public function members() {
    return $this->hasMany(RoomMember::class)->with('memberable');
  }
  
  public function admins() {
    return $this->morphedByMany(Admin::class, 'memberable', 'room_members');
  }

  public function users() {
    return $this->morphedByMany(User::class, 'memberable', 'room_members');
  }

  public function createable() {
    return $this->morphTo();
  }

  public function originalMessages() {
    return $this->hasMany(Message::class);
  }

  public function lastOriginalMessage() {
    return $this->hasOne(Message::class, 'id', 'last_message_id');
  }

  public function loadLastAuthMessage($userable) {
    return $this['last_message'] = $this->messages()
      ->where('message_id', $this->last_message_id)
      ->where('userable_id', $userable->id)
      ->where('userable_type', get_class($userable))
      ->with('originalMessage', 'originalMessage.senderable')
      ->first();
  }

  public function messages() {
    return $this->hasMany(MessageNotification::class);
  }

}
