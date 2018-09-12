<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    // Relationship with discount table
    public function Discount()
    {
        return $this->belongsTo('App/Discount');
    }
}
