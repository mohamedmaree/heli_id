<?php

namespace App\Models\Scopes;

use App\Models\SiteSetting;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PublishedCitiesScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $supported_countries = SiteSetting::where('key', 'countries')->first()->value ?? '';
        $supported_countries = json_decode($supported_countries) ?? [];
        $builder->whereIn('country_id',$supported_countries);
    }
}
