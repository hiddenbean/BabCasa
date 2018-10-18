<?php

namespace App;
use App\Language;
use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use SoftDeletes;  

    public function attributeLangs()
    {
            return $this->hasMany('App\AttributeLang')->withTrashed();
    }
    public function attributeLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        return $this->attributeLangs()->where('lang_id',$langId)->withTrashed();
    }
    
    public function attributeValue()
    {
        return $this->hasOne('App\AttributeValue');
    }
    public function attributeLangNotEmpty()
    {
        return $this->attributeLangs()->where('reference','!=',' ')->withTrashed();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a attribute to cascade to children so they are also deleted
        static::deleting(function($attribute)
        {
            $attribute->attributeLangs()->delete();
            
        });

        static::restoring(function($attribute)
        {
            $attribute->attributeLangs()->withTrashed()->restore();
        });
    }
}
