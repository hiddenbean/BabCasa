<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
//use this notification to sen an email to a specific user
use App\Notifications\StaffPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use Notifiable;
    use CausesActivity;
    use SoftDeletes;
    use LogsActivity;

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }
    protected $guard = 'staff';

    protected $fillable = [
        'email',
        'password',
        'name',
        'last_name',
        'first_name',
        'gender_id',
        'birthday',
        'profile_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'profile'
    ];

    public function claimMessages()
    {
        return $this->hasMany('App\ClaimMessage');
    }

    public function gender()
    {
        return $this->belongsTo('App\Gender');
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
        return $this->morphMany('App\Phone', 'phoneable');
    }
    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }

    public function pins()
    {
        return $this->morphMany('App\Pin', 'Pinable');
    }

    public function businesses()
    {
        return $this->hasMany('App\Business');
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
        $this->notify(new StaffPasswordNotification($token, 'staff'));
    }
}
