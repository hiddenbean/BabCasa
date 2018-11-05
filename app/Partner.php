<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use this notification to sen an email to a specific user
use App\Notifications\ResetPasswordNotification;

class Partner extends Authenticatable
{
    use Notifiable;

    //
    
    use SoftDeletes;
    use LogsActivity;
    use CausesActivity;


    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }  

    protected $fillable = ['company_name', 'email','password', 'name', 'about', 'trade_registry', 'ice', 'taxe_id', 'is_register_to_newsletter'];

    protected $hidden = ['password', 'remember_token'];

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
    public function statuses()
    {
        return $this->morphMany('App\Status', 'user');
    }
    public function status()
    {
        return $this->statuses()->orderBy('id', 'desc');
    }
    public function claimMessages()
    {
        return $this->hasMany('App\ClaimMessage');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function discounts()
    {
        return $this->hasMany('App\Discount');
    }


    public function pins()
    {
        return $this->morphMany('App\Pin', 'Pinable');
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
            //$partner->markets()->delete();
            //$partner->products()->delete();
            //$partner->bundels()->delete();
            //$partner->offers()->delete();
            
        });

        static::restoring(function($partner)
        {
            $partner->address()->withTrashed()->restore();
            $partner->picture()->withTrashed()->restore();
            $partner->phones()->withTrashed()->restore();
            //$partner->products()->delete();
            //$partner->bundels()->delete();
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
