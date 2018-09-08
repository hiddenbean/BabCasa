<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function categorieLang()
    {
            return $this->hasMany('App\CategorieLang');
    }

    public function subCategories()
    {
            return $this->hasMany('App\Categorie');
    }

    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
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
