<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute_double_value extends Model
{
    public function attributeValue()
    {
        return $this->belongsTo('App\Attribute_value');
    }
}
