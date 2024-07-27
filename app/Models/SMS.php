<?php

namespace App\Models;

class SMS extends BaseModel
{
    protected $fillable = ['name','active','sender_name','key' ,'user_name' , 'password'];
}
