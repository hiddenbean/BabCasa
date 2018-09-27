<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class country extends Model
{
    use SoftDeletes;

    public function currency()
    {
        return $this->hasOne('App\Currency');
    }
    public function addresses()
    {
        return $this->hasMany('App\Address');
    }
    public function phones()
    {
        return $this->hasMany('App\Phone');
    }

 
}
