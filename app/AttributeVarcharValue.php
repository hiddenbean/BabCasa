<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeVarcharValue extends Model
{ 

    protected $fillable = ['type'];

    public function attributeVarcharValueLang()
    {
            return $this->hasMany('App\AttributeVarcharValueLang');
    }

    public function attributeValue()
    {
        return $this->belongsTo('App\AttributeValue');
    }
}
