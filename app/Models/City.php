<?php

namespace App\Models;

use App\Models\Scopes\PublishedCitiesScope;
use App\Models\Scopes\PublishedRegionsScope;
use Spatie\Translatable\HasTranslations;

class City extends BaseModel
{
    use HasTranslations;

    protected $fillable = ['name', 'region_id', 'country_id'];

    public $translatable = ['name'];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    static function boot()
    {
        parent::boot();

        static::addGlobalScope(new PublishedCitiesScope());
    }

}
