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
            return $this->hasMany('App\Bundle_lang');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function currencie()
    {
        return $this->hasOne('App\Currencie');
    }
    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }
}
