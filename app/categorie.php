<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Language;
use App;
class Categorie extends Model
{
    public function categorieLangs()
    {
            return $this->hasMany('App\CategorieLang');
    }
    public function categorieLang()
    {
        $langId = Language::where('symbol',App::getLocale())->first()->id; 
        return $this->categorieLangs()->where('lang_id',$langId);
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
