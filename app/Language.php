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
        return $this->hasMany('App\AttributeVarcharValueLang');
    }

    public function bundleLangs()
    {
        return $this->hasMany('App\Bundle_lang');
    }

    public function categoryLang()
    {
        return $this->hasMany('App\CategoryLang');
    }
    public function discountLangs()
    {
        return $this->hasMany('App\DiscountLang');
    }
    public function detailLangs()
    {
        return $this->hasMany('App\Detail_lang');
    }

    public function detailValueLangs()
    {
        return $this->hasMany('App\DetailValueLang');
    }
    public function productLangs()
    {
        return $this->hasMany('App\ProductLang');
    }
    public function tagLang()
    {
        return $this->hasMany('App\TagLang');
    } 

}
