<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use SoftDeletes;

    protected $fillable = ['number','tag','is_default','verify', 'type', 'country_id', 'phoneable_type', 'phoneable_id'];
    //
    public function phoneable()
    {
        return $this->morphTo();
    }
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
