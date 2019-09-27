<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes; 
    use LogsActivity;

    protected static $logFillable = true;

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "has {$eventName} the address ID : <u>{$this->id}</a>";
    }
    protected $fillable = ['address', 'address_two', 'full_name', 'country_id', 'city', 'zip_code', 'longitude', 'latitude', 'addressable_type', 'addressable_id'];
    
    public function addressable()
    {
        return $this->morphTo();
    }
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
