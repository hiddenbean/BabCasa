<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount_lang extends Model
{
    public function discount()
    {
        return $this->belongsTo('App\Discount');
    }
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}
