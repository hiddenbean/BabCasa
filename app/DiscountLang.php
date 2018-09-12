<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountLang extends Model
{
    // Relationship with discount table
    public function Discount()
    {
        return $this->belongsTo('App/Discount');
    }
}
