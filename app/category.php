<?php

namespace App;
use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public function categoryLangs()
    {
            return $this->hasMany('App\CategoryLang');
    }
    public function categoryLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        return $this->categoryLangs()->where('lang_id',$langId);
    }

    public function subCategories()
    {
            return $this->hasMany('App\Category');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function attributes()
    {
        return $this->belongsToMany('App\Attribute');
    }
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    public function details()
    {
        return $this->belongsToMany('App\Detail');
    }
    
    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }

    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a category to cascade to children so they are also deleted
        static::deleting(function($category)
        {
            $category->categoryLangs()->delete();
            
        });

        static::restoring(function($category)
        {
            $category->categoryLangs()->withTrashed()->restore();
        });
    }
}
