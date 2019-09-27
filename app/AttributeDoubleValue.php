<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class AttributeDoubleValue extends Model
{  

    protected $fillable = ['type'];


    public function attributeValue()
    {
        return $this->belongsTo('App\AttributeValue');
    }
}
