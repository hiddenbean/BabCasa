<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Partner extends Authenticatable
{
    //
    
    protected $fillable = ['company_name', 'email','password', 'name', 'about', 'trade_registry', 'ice', 'taxe_id'];
    protected $guard = 'partner';
}
