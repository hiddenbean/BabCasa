<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bundle extends Model
{
    // Relationship with discount table
    public function Discount()
    {
        return $this->belongsToMany('App/Discount');
    }
}
