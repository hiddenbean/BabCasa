<?php

namespace App;

use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectLang extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = ['reference', 'description', 'subject_id', 'lang_id'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    function subject()
    {
        return $this->belingsTo('App\Subject');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
