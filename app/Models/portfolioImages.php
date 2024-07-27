<?php

namespace App\Models;

class portfolioImages extends BaseModel
{
    const IMAGEPATH = 'portfolios' ; 

    protected $fillable = ['portfolio_id' ,'image'];

}
