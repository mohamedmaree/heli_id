<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Copy extends BaseModel
{
    const IMAGEPATH = 'copys' ; 

    use HasTranslations; 
    protected $fillable = ['title','description' ,'image'];
    public $translatable = ['title','description'];

}
