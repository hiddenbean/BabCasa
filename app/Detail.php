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
            return $this->hasMany('App\DetailLang');
    }
    
    public function detailLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        return $this->detailLangs()->where('lang_id',$langId);
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    public function detailValue()
    {
            return $this->hasOne('App\DetaiValue');
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
