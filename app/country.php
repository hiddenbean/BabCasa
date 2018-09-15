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

 
}
