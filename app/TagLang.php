<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;


class TagLang extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = ['tag', 'tag_id', 'lang_id'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
