<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model {
  use SoftDeletes;

  protected $fillable = [
    'transactionable_id',
    'transactionable_type',
    'forable_id',
    'forable_type',
    'dept',
    'credit',
    'type',
    'pay_data', // save online pay for addBalance type
  ];

  protected $casts = [
    'dept'     => 'decimal:2',
    'credit'   => 'decimal:2',
    'pay_data' => 'array',
  ];

  public function getMessageAttribute() {
    $msg = trans('transactions.' . $this->attributes['type']);
    return $msg;
  }

  public function getAmountAttribute() {
    return $this->dept > 0 ? -$this->dept : $this->credit;
  }

  public function transactionable() {
    //? rel with users, admins, providers, delegates
    return $this->morphTo();
  }

  public function forable() {
    //? rel with order, service, packages
    return $this->morphTo();
  }

}
