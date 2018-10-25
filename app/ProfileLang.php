<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProfileLang extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = ['reference', 'description', 'profile_id', 'lang_id'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }
    
    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
