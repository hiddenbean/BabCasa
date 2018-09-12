<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use this notification to sen an email to a specific user
use App\Notifications\ResetPasswordNotification;

class Partner extends Authenticatable
{
    use Notifiable;

    //
    
    use SoftDeletes;  

    protected $fillable = ['company_name', 'email','password', 'name', 'about', 'trade_registry', 'ice', 'taxe_id'];
    protected $guard = 'partner';

    public function address()
    {
        return $this->morphOne('App\Address', 'addressable');
    }
    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }
    public function claims()
    {
        return $this->morphMany('App\Claim', 'claimable');
    }

    public function phones()
    {
        return $this->morphMany('App\Phone', 'phoneable');
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
            
        });

        static::restoring(function($partner)
        {
            $partner->address()->withTrashed()->restore();
            $partner->picture()->withTrashed()->restore();
            $partner->phones()->withTrashed()->restore();
        });
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token, 'partner'));
    }
}
