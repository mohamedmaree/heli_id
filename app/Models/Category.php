<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Category extends BaseModel
{
    use HasTranslations;

    const IMAGEPATH = 'categories' ; 

    protected $fillable = ['name','parent_id','is_active' ,'image'];
    public $translatable = ['name'];
    

    public function childes(){
        return $this->hasMany(self::class,'parent_id');
    }

    public function parent(){
         return $this->belongsTo(self::class,'parent_id');
    }


    public function subChildes()
    {
         return $this->childes()->with( 'subChildes' );
    }

    public function subParents()
    {
        return $this -> parent()->with('subParents');
    }

    public function getAllChildren ()
    {
        $sections = new Collection();
        foreach ($this->childes as $section) {
            $sections->push($section);
            $sections = $sections->merge($section->getAllChildren());
        }
        return $sections;
    }

    public function getAllParents()
    {
        $parents = collect([]);

        $parent = $this->parent;

        while(!is_null($parent)) {
            $parents->prepend($parent);
            $parent = $parent->parent;
        }
        return $parents;
    }

    public function getFullPath(){
        $parents  = $this->getAllParents () ;
        $current  = Category::where('id',$this->id)->get();
        $parents  = $parents->merge($current);
        $childs   = $this->getAllChildren () ;
        $path     = $childs->merge($parents);
        return $path ;
    }


    public function getFollowedCategoryAttribute()
    {
        if ($this->attributes['parent_id']) {
            return $this->parent->name;
        } else {
            return __('admin.main_section');
        }
    }


    public function scopeActive($query){
        return $query->where('is_active',1);
    }


}
