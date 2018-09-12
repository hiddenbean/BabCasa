<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;
use App\Language;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
    public function detailLangs()
    {
            return $this->hasMany('App\DetailLang');
    }
    
    public function detailLang()
    {
        $langId = Language::where('symbol',App::getLocale())->first()->id; 
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
}
