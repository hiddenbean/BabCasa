<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Business extends Authenticatable
{

    use SoftDeletes;
    
    protected $guard = 'business';

    protected $fillable = ['name', 'company_name', 'email', 'password', 'about', 'trade_registry', 'ice', 'taxe_id', 'is_register_to_newsletter'];

    protected $hidden = ['password', 'remember_token'];

    public function statuses()
    {
        return $this->morphMany('App\Status', 'user');
    }

    public function status()
    {
        return $this->statuses()->orderBy('id', 'desc');
    }

    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }

    public function Phones()
    {
        return $this->morphMany('App\Phone', 'phoneable');
    }

    public function address()
    {
        return $this->morphOne('App\Address', 'addressable');
    }

    public function pins()
    {
        return $this->morphMany('App\Pin', 'Pinable');
    }

    public function orders()
    {
        return $this->morphMany('App\Order', 'costumer');
    }

    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a product to cascade to children so they are also deleted
        static::deleting(function($partner)
        {
            $partner->address()->delete();
            $partner->picture()->delete();
            $partner->phones()->delete();
            $partner->orders()->delete();
            $partner->markets()->delete();
            $partner->markets()->delete();
            
        });

        static::restoring(function($partner)
        {
            $partner->address()->withTrashed()->restore();
            $partner->picture()->withTrashed()->restore();
            $partner->phones()->withTrashed()->restore();
        });
    }
}
