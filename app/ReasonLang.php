<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ReasonLang extends Model
{
    use LogsActivity;

    protected $fillable = ['reference', 'short_description', 'description', 'reason_id', 'lang_id'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    function reason()
    {
        return $this->belingsTo('App\Reason');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
