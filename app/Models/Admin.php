<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\SmsTrait;
use Carbon\Carbon;
use App\Jobs\SendEmailJob;
use App\Jobs\SendSms;

class Admin extends Authenticatable {
  use Notifiable, UploadTrait, SoftDeletes, SmsTrait ;

  protected $fillable = [
    'name',
    'country_code',
    'phone',
    'email',
    'password',
    'avatar',
    'role_id',
    'is_notify',
    'is_blocked',
    'code',
    'code_expire'
  ];

  protected $hidden = [
    'password',
  ];

  protected $casts = [
    'is_notify'  => 'boolean',
    'is_blocked' => 'boolean',
  ];

  public function getAvatarAttribute() {
    if ($this->attributes['avatar']) {
        $image = $this->getImage($this->attributes['avatar'], 'admins');
    } else {
        $image = $this->defaultImage('admins');
    }
    return $image;
  }

  public function setCountryCodeAttribute($value)
  {
      if (!empty($value)) {
          $this->attributes['country_code'] = fixPhone($value);
      }
  }

  public function getFullPhoneAttribute()
  {
      return $this->attributes['country_code'] . $this->attributes['phone'];
  }

    public function scopeSearch($query, $searchArray = [])
    {
        return $query->when(@$searchArray['created_at_min']
            && @$searchArray['created_at_max'], function ($q) use ($searchArray) {
            $q->whereDate('created_at', '>=', @$searchArray['created_at_min'])
                ->whereDate('created_at', '<=', @$searchArray['created_at_max']);
        })
            ->when(@$searchArray['created_at_min'], function ($q) use ($searchArray) {
                $q->whereDate('created_at', @$searchArray['created_at_min']);
            })
            ->when(@$searchArray['created_at_max'], function ($q) use ($searchArray) {
                $q->whereDate('created_at', @$searchArray['created_at_max']);
            })
            ->when(@$searchArray['order'], function ($q) use ($searchArray) {
                $q->orderBy('created_at', @$searchArray['order']);
            })
            ->when(@$searchArray['name'], function ($q) use ($searchArray) {
                $q->where('name', 'LIKE', '%' . @$searchArray['name'] . '%');
            })
            ->when(@$searchArray['phone'], function ($q) use ($searchArray) {
                $q->where('phone', 'LIKE', '%' . @$searchArray['phone']);
            })
            ->when(@$searchArray['email'], function ($q) use ($searchArray) {
                $q->where('email', 'LIKE', '%' . @$searchArray['email']);
            });
    }

  public function setAvatarAttribute($value) {
      if (null != $value && is_file($value) ) {
          isset($this->attributes['avatar']) ? $this->deleteFile($this->attributes['avatar'] , 'admins') : '';
          $this->attributes['avatar'] = $this->uploadAllTyps($value, 'admins');
      }
  }

  public function role() {
    return $this->belongsTo(Role::class)->withTrashed();
  }

  public function setPasswordAttribute($value) {
    if ($value) {
      $this->attributes['password'] = bcrypt($value);
    }
  }

  public function replays() {
    return $this->morphMany(ComplaintReplay::class, 'replayer');
  }

  public function rooms() {
    return $this->morphMany(RoomMember::class, 'memberable');
  }

  public function ownRooms() {
    return $this->morphMany(Room::class, 'createable');
  }

  public function joinedRooms() {
    return $this->morphMany(RoomMember::class, 'memberable')
      ->with('room')
      ->get()
      ->sortByDesc('last_message_id')
      ->pluck('room');
  }
  
  public function transactions() {
    return $this->morphMany(Transaction::class, 'transactionable')->latest();
  }

  
  public function notifications() {
    return $this->morphMany(Notification::class, 'notifiable')->orderBy('created_at', 'desc');

  }

  public function sendVerificationCode(){
      $this->update([
          'code'        => $this->activationCode(),
          'code_expire' => Carbon::now()->addMinute(),
      ]);

      // $this->sendCodeAtSms($this->code);
      $this->sendEmail($this->code);
  }

  private function activationCode(){
      return mt_rand(111111, 999999);
  }

  public function sendCodeAtSms($code ,$full_phone = null){
    $msg = trans('apis.activeCode');
    dispatch(new SendSms($full_phone ?? $this->full_phone , $msg . $code));
  }


  public function sendEmail($code ,$full_phone = null){
    $msg = __('apis.activeCode');
    $data = ['title' => __('admin.reset_password'),'message' => $msg.$code];
    dispatch(new SendEmailJob($this->email,$data  ));
  }


  public static function boot() {
    parent::boot();
    /* creating, created, updating, updated, deleting, deleted, forceDeleted, restored */

    static::deleted(function($model) {
        $model->deleteFile($model->attributes['avatar'], 'admins');
    });

  }

}
