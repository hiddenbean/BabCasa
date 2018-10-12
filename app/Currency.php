<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public function attributeValue()
    {
        return $this->belongsTo('App\AttributeValue');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function bundle()
    {
        return $this->belongsTo('App\Bundles');
    }
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
