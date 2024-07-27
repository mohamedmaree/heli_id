<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class IntroFqs extends BaseModel
{
    use HasTranslations; 
    protected $fillable = ['title','description','intro_fqs_category_id'];
    public $translatable = ['title','description'];

    /**
     * Get the category that owns the IntroFqs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(IntroFqsCategory::class, 'intro_fqs_category_id', 'id');
    }
}
