<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeDateValue extends Model
{
    public function attributeValue()
    {
        return $this->belongsTo('App\AttributeValue');
    }
}
