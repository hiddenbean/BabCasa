<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConditionLang extends Model
{
    use SoftDeletes;
    function condition()
    {
        return $this->belingsTo('App\Condition');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
