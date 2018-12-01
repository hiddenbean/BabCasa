<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Business extends Authenticatable
{

    use Notifiable;
    use SoftDeletes;
    use LogsActivity;

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }
    
    protected $guard = 'business';

    protected $fillable = ['name', 'company_name', 'email', 'password', 'about','first_name', 'last_name', 'admin_email', 'trade_registry', 'ice', 'taxe_id', 'is_register_to_newsletter'];

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
        return $this->morphOne('App\Picture', 'pictureable')->withTrashed();;
    }

    public function phones()
    {
        return $this->morphMany('App\Phone', 'phoneable')->withTrashed();;
    }

    public function address()
    {
        return $this->morphOne('App\Address', 'addressable')->withTrashed();;
    }

    public function pins()
    {
        return $this->morphMany('App\Pin', 'Pinable');
    }

    public function orders()
    {
        return $this->morphMany('App\Order', 'costumer');
    }

    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a product to cascade to children so they are also deleted
        static::deleting(function($business)
        {
            $business->address()->delete();
            $business->picture()->delete();
            $business->phones()->delete();
            $business->orders()->delete();
            //$business->markets()->delete();
            //$business->offers()->delete();
            
        });

        static::restoring(function($business)
        {
            $business->address()->withTrashed()->restore();
            $business->picture()->withTrashed()->restore();
            $business->phones()->withTrashed()->restore();
        });
    }
}
