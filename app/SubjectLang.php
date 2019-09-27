<?php

namespace App;

use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectLang extends Model
{
    use SoftDeletes;
    function subject()
    {
        return $this->belingsTo('App\Subject');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
