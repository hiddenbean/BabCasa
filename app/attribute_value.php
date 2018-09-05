<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute_value extends Model
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
        return $this->hasOne('App\Attribute_value');
    }
    
    public function parent()
    {
        return $this->belongsTo('App\Attribute_value');
    }

    
    
    public function attributeVarcharValue()
    {
        return $this->hasOne('App\Attribute_varchar_value');
    }
    public function attributeDateValue()
    {
        return $this->hasOne('App\Attribute_date_value');
    }
    public function attributeDoubleValue()
    {
        return $this->hasOne('App\Attribute_double_value');
    }


    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }
}
