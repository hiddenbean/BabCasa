<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Bundle extends Model
{  
    use LogsActivity;

    protected $fillable = ['type'];

    protected static $logFillable = true;

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "has {$eventName} the bandle ID : <u>{$this->id}</u>";
        
    }

    // Relationship with discount table
    public function discount()
    {
        return $this->belongsToMany('App/Discount');
    }
    
    public function bundleLangs()
    {
            return $this->hasMany('App\BundleLang');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function currency()
    {
        return $this->hasOne('App\Currency');
    }
    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }

    public function orders()
    {
            return $this->morphToMany('App\Order', 'orderable');
    }
}
