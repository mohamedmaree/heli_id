<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatusHistory extends Model {
  use SoftDeletes;

  protected $table = 'order_status_history';

  protected $fillable = [
    'order_id',
    'status',
    'statusable_id',
    'statusable_type',
    'lat',
    'lng',
    'map_desc',
  ];

  protected $casts = [
    'lat' => 'decimal:8',
    'lng' => 'decimal:8',
  ];

  public function statusable() {
    //? rel with users, admins, providers, delegates
    return $this->morphTo();
  }
}
