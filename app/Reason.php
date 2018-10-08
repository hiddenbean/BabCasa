<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App;
use App\Language;

class Reason extends Model
{
    use SoftDeletes;

    function reasonLangs()
    {
        return $this->hasMany('App\ReasonLang');
    }
    public function reasonLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        return $this->reasonLangs()->where('lang_id',$langId);

    }
    public function statuses()
    {
        return $this->belongsToMany('App\Status')->withTimestamps();
    }
}
