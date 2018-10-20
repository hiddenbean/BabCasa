<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;
use App\Language;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
    use SoftDeletes;

    public function detailLangs()
    {
            return $this->hasMany('App\DetailLang')->withTrashed();
    }
    
    public function detailLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        $detail = self::detailLangs()->where('lang_id',$langId)->withTrashed()->first();
        return !$detail->value ? self::detailLangs()->where('value','!=','')->withTrashed()->first() : $detail;
    }

    public function detailLangNotEmpty()
    {
        return $this->detailLangs()->where('value','!=',' ')->withTrashed();
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTrashed();
    }
    public function detailValue()
    {
            return $this->hasOne('App\DetailValue');
    }
    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a detail to cascade to children so they are also deleted
        static::deleting(function($detail)
        {
            $detail->detailLangs()->delete();
            
        });

        static::restoring(function($detail)
        {
            $detail->detailLangs()->withTrashed()->restore();
        });
    }
}
