<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class GenderLang extends Model
{
    use SoftDeletes;   
    use LogsActivity;
    protected static $logFillable = true;

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    public function category()
    {
        return $this->belongsTo('App\Category')->withTrashed();
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
