<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    // Relationship with discount langs table
    public function DiscountLangs()
    {
        return $this->hasMany('App/DiscountLang');
    }

    // Relationship with product table
    public function Products()
    {
        return $this->belongsToMany('App/Product');
    }

    // Relationship with bundle table
    public function Bundles()
    {
        return $this->belongsToMany('App/Bundle');
    }

    // Relationship with attribute value table
    public function AttributeValues()
    {
        return $this->belongsToMany('App/AttributeValue');
    }
}
