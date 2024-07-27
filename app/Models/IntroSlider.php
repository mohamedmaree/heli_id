<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class IntroSlider extends BaseModel
{
    use HasTranslations; 
    const IMAGEPATH = 'intro_sliders' ; 
    protected $fillable = ['image','title','description'];
    public $translatable = ['title' , 'description'];
}
