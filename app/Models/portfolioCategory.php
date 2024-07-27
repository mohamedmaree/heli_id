<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class portfolioCategory extends BaseModel
{
    const IMAGEPATH = 'portfoliocategories' ; 

    use HasTranslations; 
    protected $fillable = ['name'];
    public $translatable = ['name'];

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class, 'portfolio_category_id', 'id');
    }

}
