<?php

namespace App;
use App;
use App\Language;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Condition extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = [];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "has {$eventName} the condition ID : <u><a href=".url('conditions/'.$this->id).">{$this->id}</a></u>";
    }

    function conditionLangs()
    {
        return $this->hasMany('App\conditionLang')->withTrashed();
    }
    public function conditionLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        $condition = self::conditionLangs()->where('lang_id',$langId)->first();

        return !isset($condition->reference)||$condition->reference=='' ? self::conditionLangs()->where('reference','!=','')->first() : $condition;

    }
}
