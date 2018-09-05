<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag_lang extends Model
{
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}
