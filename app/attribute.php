<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    
    public function attributeLang()
    {
            return $this->hasMany('App\Attribute_lang');
    }
    
    public function attributeValue()
    {
        return $this->hasOne('App\Attribute_value');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Categorie');
    }
}
