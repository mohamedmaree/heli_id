<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class IntroService extends BaseModel
{
    use HasTranslations; 
    protected $fillable = ['title' ,'short_description', 'description','icon','image'];
    public $translatable = ['title' , 'description','short_description'];
}
