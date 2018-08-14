<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['number', 'type', 'code_country_id', 'phoneable_type', 'phoneable_id'];
    //
}
