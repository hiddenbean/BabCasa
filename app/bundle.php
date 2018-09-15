<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    // Relationship with discount table
    public function discount()
    {
        return $this->belongsToMany('App/Discount');
    }
    
    public function bundleLangs()
    {
            return $this->hasMany('App\BundleLang');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function currency()
    {
        return $this->hasOne('App\Currency');
    }
    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }
}
