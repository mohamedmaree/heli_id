<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Intro extends BaseModel
{
    const IMAGEPATH = 'intros' ; 
    use HasTranslations; 
    protected $fillable = ['title','description' ,'image'];
    public $translatable = ['title','description'];

}
