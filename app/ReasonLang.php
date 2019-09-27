<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReasonLang extends Model
{
    use SoftDeletes;
    function reason()
    {
        return $this->belingsTo('App\Reason');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
