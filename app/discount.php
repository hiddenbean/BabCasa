<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    public function discountLangs()
    {
            return $this->hasMany('App\Discount_lang');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }
}
