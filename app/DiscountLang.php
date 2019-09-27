<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountLang extends Model
{
    use SoftDeletes;
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
