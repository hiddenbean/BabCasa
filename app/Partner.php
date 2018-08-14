<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Partner extends Authenticatable
{
    protected $guard = 'partner';
}
