<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ClientSendPasswordResetLink;

class ParticularClient extends Authenticatable
{
    use SoftDeletes;
    use LogsActivity;
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'first_name', 'last_name', 'birthday', 'gender_id', 'is_register_to_newsletter'];

    protected $hidden = ['password', 'remember_token'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    public function address()
    {
        return $this->morphOne('App\Address', 'addressable');
    }

    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }
    public function logs()
    {
        return $this->morphMany('App\ActivityLog', 'causer');
    }

    public function phone()
    {
        return $this->morphOne('App\Phone', 'phoneable');
    }
    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    public function orders()
    {
        return $this->morphMany('App\Order', 'costumer');
    }
   

    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a product to cascade to children so they are also deleted
        static::deleting(function($particular_client)
        {
            $particular_client->address()->delete();
            $particular_client->picture()->delete();
            $particular_client->phones()->delete();
            // $particular_client->orders()->delete();
            
        });

        static::restoring(function($particular_client)
        {
            $particular_client->address()->withTrashed()->restore();
            $particular_client->picture()->withTrashed()->restore();
            $particular_client->phones()->withTrashed()->restore();
        });
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ClientSendPasswordResetLink($token));
    }
}
