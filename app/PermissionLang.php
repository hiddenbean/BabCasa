<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionLang extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = ['reference', 'description', 'lang_id', 'permission_id'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
