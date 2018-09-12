<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailValue extends Model
{
    public function detailValueLangs()
    {
            return $this->hasMany('App\DetailValueLang');
    }

    public function prodcut()
    {
            return $this->belongsTo('App\Products');
    }
}
