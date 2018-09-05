<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_lang extends Model
{
    public function detail()
    {
        return $this->belongsTo('App\Detail');
    }
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}
