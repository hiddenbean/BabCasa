<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_value_lang extends Model
{
    public function detailValue()
    {
            return $this->belongsTo('App\Detail_value');
    }
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}

