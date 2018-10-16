<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailLang extends Model
{
    use SoftDeletes;
    public function detail()
    {
        return $this->belongsTo('App\Detail');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
