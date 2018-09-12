<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function categoryLang()
    {
            return $this->hasMany('App\CategoryLang');
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
}
