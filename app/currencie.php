<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currencie extends Model
{
    public function attributeValue()
    {
        return $this->belongsTo('App\AttributeValue');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function bundle()
    {
        return $this->belongsTo('App\Bundles');
    }
}
