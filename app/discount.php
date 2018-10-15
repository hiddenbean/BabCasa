<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    // Relationship with discount langs table
    public function discountLangs()
    {
        return $this->hasMany('App/DiscountLang');
    }

    // Relationship with product table
    public function products()
    {
        return $this->belongsToMany('App/Product');
    }

    // Relationship with bundle table
    public function bundles()
    {
        return $this->belongsToMany('App/Bundle');
    }

    // Relationship with attribute value table
    public function attributeValues()
    {
        return $this->belongsToMany('App/AttributeValue');
    }

    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }
    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }
}
