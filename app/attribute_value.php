<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attribute_value extends Model
{
    // Relationship with discount table
    public function Discount()
    {
        return $this->belongsToMany('App/Discount');
    }
}
