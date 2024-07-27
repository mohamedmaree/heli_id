<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Portfolio extends BaseModel
{
    const IMAGEPATH = 'portfolios' ; 

    use HasTranslations; 
    protected $fillable = ['portfolio_category_id','client' ,'date','url','description'];
    public $translatable = ['client','description'];

    public function category()
    {
        return $this->belongsTo(portfolioCategory::class, 'portfolio_category_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(portfolioImages::class, 'portfolio_id', 'id');
    }

}
