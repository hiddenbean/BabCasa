<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GenderLang extends Model
{
    use SoftDeletes;   

    public function category()
    {
        return $this->belongsTo('App\Category')->withTrashed();
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
