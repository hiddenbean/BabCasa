<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }

    public function reasons()
    {
        return $this->belongsToMany('App\Reason')->withTimestamps();
    }
}
