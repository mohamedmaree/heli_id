<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class SiteSetting extends BaseModel
{
    protected $fillable = ['key', 'value'];
}
