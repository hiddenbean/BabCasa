<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountLang extends Model
{
    
    // Relationship with discount table
    public function discount()
    {
        return $this->belongsTo('App\Discount');
    }
    
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
