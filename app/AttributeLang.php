<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeLang extends Model
{
    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
