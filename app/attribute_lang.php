<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute_lang extends Model
{
    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}
