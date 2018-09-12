<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    protected $fillable = [
        'email',
        'password',
        'name',
        'last_name',
        'first_name',
        'gender',
        'birthday',
        'profile_id',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function claimMessages()
    {
        return $this->hasMany('App\ClaimMessage');
    }

    public function claims()
    {
        return $this->hasMany('App\Claim');
    }

    public function address()
    {
        return $this->morphOne('App\Address', 'addressable');
    }

    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }

    public function phones()
    {
        return $this->morphOne('App\Phone', 'phoneable');
    }
}
