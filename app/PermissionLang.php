<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PermissionLang extends Model
{
    use SoftDeletes;

    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
