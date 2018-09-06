<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function attributeLang()
    {
        return $this->hasMany('App\Attribute_lang');
    }
    
    public function attributeVarcharValueLang()
    {
        return $this->hasMany('App\Attribute_varchar_value_lang');
    }

    public function bundleLangs()
    {
        return $this->hasMany('App\Bundle_lang');
    }

    public function categorieLang()
    {
        return $this->hasMany('App\Categorie_lang');
    }
    public function discountLangs()
    {
        return $this->hasMany('App\Discount_lang');
    }
    public function detailLangs()
    {
        return $this->hasMany('App\Detail_lang');
    }

    public function detailValueLangs()
    {
        return $this->hasMany('App\Detail_value_lang');
    }
    public function productLangs()
    {
        return $this->hasMany('App\Product_lang');
    }
    public function tagLang()
    {
        return $this->hasMany('App\Tag_lang');
    } 

}
