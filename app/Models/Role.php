<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends BaseModel
{
    use SoftDeletes;
    use HasTranslations; 

    protected $fillable = ['name'];

    public $translatable = ['name'];

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

}
