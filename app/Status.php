<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Status extends Model
{
    use LogsActivity;

    protected $fillable = ['is_approved', 'user_id', 'user_type', 'staff_id'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "has {$eventName} the status ID : <u>{$this->id}</u>";
    }

    public function user()
    {
        return $this->morphTo();
    }

    public function reasons()
    {
        return $this->belongsToMany('App\Reason')->withTimestamps();
    }
    
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }
}
