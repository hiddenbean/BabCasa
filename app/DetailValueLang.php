<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailValueLang extends Model
{
    public function detailValue()
    {
            return $this->belongsTo('App\DetailValue');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}

