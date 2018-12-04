<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProfileLang extends Model
{
    use SoftDeletes;
    
    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
