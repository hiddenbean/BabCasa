<?php

namespace App;
use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    public function tagLangs()
    {
        return $this->hasMany('App\TagLang');
    } 
    
    public function tagLang()
    {
        $langId = Language::where('symbol',App::getLocale())->first()->id; 
        return $this->tagLangs()->where('lang_id',$langId);

    }
}
