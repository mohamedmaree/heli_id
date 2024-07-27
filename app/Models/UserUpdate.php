<?php

namespace App\Models;

class UserUpdate extends BaseModel
{
    protected $fillable = ['type','phone','code','country_code','user_id','email'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    private function activationCode()
    {
        return 1234;
        return mt_rand(1111, 9999);
    }

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = $this->activationCode();
    }

}
