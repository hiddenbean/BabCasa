<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class country extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = ['name', 'phone_code', 'alpha_2_code', 'currency', 'currency_symbole'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }
    public function addresses()
    {
        return $this->hasMany('App\Address');
    }
    public function phones()
    {
        return $this->hasMany('App\Phone');
    }

 
}
