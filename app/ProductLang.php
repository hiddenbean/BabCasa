<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLang extends Model
{
    

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
