<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TagLang extends Model
{
    use SoftDeletes;
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
