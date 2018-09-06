<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{

    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }

    public function currencie()
    {
        return $this->hasOne('App\Currencie');
    }
    public function child()
    {
        return $this->hasOne('App\AttributeValue');
    }
    
    public function parent()
    {
        return $this->belongsTo('App\AttributeValue');
    }

    
    
    public function attributeVarcharValue()
    {
        return $this->hasOne('App\AttributeVarcharValue');
    }
    public function attributeDateValue()
    {
        return $this->hasOne('App\AttributeDateValue');
    }
    public function attributeDoubleValue()
    {
        return $this->hasOne('App\AttributeDoubleValue');
    }


    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }
}
