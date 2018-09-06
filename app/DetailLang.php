<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailLang extends Model
{
    public function detail()
    {
        return $this->belongsTo('App\Detail');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
