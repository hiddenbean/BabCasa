<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Pin extends Model
{
    use LogsActivity;

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }
    protected $fillable = ['code', 'expired', 'expired_at', 'pinable_id', 'pinable_type'];
    
    public function pinable()
    {
        return $this->morphTo();
    }
}
