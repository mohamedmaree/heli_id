<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class IntroFqsCategory extends BaseModel
{
    use HasTranslations; 
    protected $fillable = ['title'];
    public $translatable = ['title'];
    public function questions()
    {
        return $this->hasMany(IntroFqs::class, 'intro_fqs_category_id', 'id');
    }
}
