<?php

namespace App;

use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
    public function profileLangs()
    {
            return $this->hasMany('App\ProfileLang');
    }

    public function profileLang()
    {
            $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
            return $this->profileLangs()->where('lang_id',$langId);
    }

    public function permissions()
    {
            return $this->belongsToMany('App\Permission')->withPivot('can_read', 'can_write');
    }
    public function staff()
    {
            return $this->hasMany('App\Staff');
    }
}
