<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Team extends BaseModel
{
    const IMAGEPATH = 'teams' ; 

    use HasTranslations; 
    protected $fillable = ['name','job' ,'image'];
    public $translatable = ['name','job'];

}
