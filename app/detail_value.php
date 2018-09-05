<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_value extends Model
{
    public function detailValueLangs()
    {
            return $this->hasMany('App\Detail_value_lang');
    }

    public function prodcut()
    {
            return $this->belongsTo('App\Products');
    }
}
