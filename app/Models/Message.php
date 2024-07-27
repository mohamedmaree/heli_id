<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;

class Message extends Model {
  use UploadTrait;

  protected $fillable = [
    'room_id',
    'senderable_id',
    'senderable_type',
    'body',
    'type',
  ];

  public function senderable() {
    return $this->morphTo();
  }

  public function getBodyAttribute() {
    if ($this->type == 'file' || $this->type == 'sound' || $this->type == 'video' || $this->type == 'image') {
      return $this->getImage($this->attributes['body'], 'rooms/' . $this->room_id);
    }
    return $this->attributes['body'];
  }

}
