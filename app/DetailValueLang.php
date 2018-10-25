<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class DetailValueLang extends Model
{

    use LogsActivity;

    protected $fillable = ['value', 'detail_value_id', 'lang_id'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    public function detailValue()
    {
            return $this->belongsTo('App\DetailValue');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}

