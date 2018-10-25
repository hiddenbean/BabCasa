<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Picture extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    } 

    protected $fillable = ['name', 'tag', 'extension', 'path', 'pictureable_type', 'pictureable_id'];
    
    public function pictureable()
    {
        return $this->morphTo();
    }
}
