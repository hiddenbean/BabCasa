<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Language;
use App;
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
        return $this->belongsToMany('App\Categorie');
    }
}
