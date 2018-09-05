<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute_varchar_value extends Model
{
    public function attributeVarcharValueLang()
    {
            return $this->hasMany('App\Attribute_varchar_value_lang');
    }

    public function attributeValue()
    {
        return $this->belongsTo('App\Attribute_value');
    }
}
