<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{

    protected $fillable = ['code', 'expired', 'expired_at', 'pinable_id', 'pinable_type'];
    
    public function pinable()
    {
        return $this->morphTo();
    }
}
