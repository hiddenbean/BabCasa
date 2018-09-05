<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_lang extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}
