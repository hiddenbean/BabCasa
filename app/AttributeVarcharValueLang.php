<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeVarcharValueLang extends Model
{
    public function attributeVarcharValue()
    {
        return $this->belongsTo('App\AttributeVarcharValue');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
