<?php

namespace App;
use App\Language;
use App;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    
    public function attributeLangs()
    {
            return $this->hasMany('App\AttributeLang');
    }
    public function attributeLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        return $this->attributeLangs()->where('lang_id',$langId);
    }
    
    public function attributeValue()
    {
        return $this->hasOne('App\AttributeValue');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
