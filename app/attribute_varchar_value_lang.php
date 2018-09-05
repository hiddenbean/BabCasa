<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute_varchar_value_lang extends Model
{
    public function attributeVarcharValue()
    {
        return $this->belongsTo('App\Attribute_varchar_value');
    }
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}
