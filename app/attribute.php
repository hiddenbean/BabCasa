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
        $attribute = self::attributeLangs()->where('lang_id',$langId)->withTrashed()->first();
        return ($attribute->reference == ' '|| $attribute->reference == '') ? self::attributeLangs()->where('reference','!=',' ')->withTrashed()->first() : $attribute;
    }
    
    public function attributeValues()
    {
        return $this->hasMany('App\AttributeValue');
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
