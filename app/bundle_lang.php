<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bundle_lang extends Model
{
    public function Bundle()
    {
        return $this->belongsTo('App\Bundle');
    }
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}
