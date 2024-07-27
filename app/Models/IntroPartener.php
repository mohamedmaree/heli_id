<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;

class IntroPartener extends BaseModel
{
    use HasTranslations;
    const IMAGEPATH = 'parteners' ; 

    protected $fillable = ['name','job','opinion','image'];
    public $translatable = ['opinion','job','name'];
}
