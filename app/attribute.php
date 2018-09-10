<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    
    public function attributeLangs()
    {
            return $this->hasMany('App\AttributeLang');
    }
    
    public function attributeValue()
    {
        return $this->hasOne('App\AttributeValue');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Categorie');
    }
}
