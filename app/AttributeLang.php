<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeLang extends Model
{
    use SoftDeletes;  

    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
