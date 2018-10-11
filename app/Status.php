<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function user()
    {
        return $this->morphTo();
    }

    public function reasons()
    {
        return $this->belongsToMany('App\Reason')->withTimestamps();
    }
}
