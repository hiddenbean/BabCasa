<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailLang extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = ['value', 'lang_id', 'detail_id'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    public function detail()
    {
        return $this->belongsTo('App\Detail');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
