<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagLang extends Model
{
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
