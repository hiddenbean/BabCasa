<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use SoftDeletes;  

    protected $fillable = ['number', 'type', 'code_country_id', 'phoneable_type', 'phoneable_id'];
    //
    public function phoneable()
    {
        return $this->morphTo();
    }
}
