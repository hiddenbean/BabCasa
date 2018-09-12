<?php

namespace App;
use App\Language;
use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use sofeDeletes;
    public function productLangs()
    {
            return $this->hasMany('App\ProductLang');  
    }

    public function tags()
    {
            return $this->belongsToMany('App\Tag');
    }

    public function bundles()
    {
            return $this->belongsToMany('App\Bundle');
    }

    public function discounts()
    {
            return $this->belongsToMany('App\Discount');
    }

    public function currencie()
    {
        return $this->hasOne('App\Currencie');
    }

    public function detailValues()
    {
            return $this->hasMany('App\DetailValue');
    }

    public function pictures()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Categorie');
    }

    public function productLang()
    {
        $langId = Language::where('symbol',App::getLocale())->first()->id; 
        return $this->productLangs()->where('lang_id',$langId);

    }



}
