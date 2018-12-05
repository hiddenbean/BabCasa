<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;
use App\Language;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
    use SoftDeletes;
    use LogsActivity;


    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "has {$eventName} the detail ID : <u><a href=".url('details/'.$this->id).">{$this->id}</a></u>";
    }

    /**
     * 
     */
    public function detailLangs()
    {
            return $this->hasMany('App\DetailLang')->withTrashed();
    }
    
    public function detailLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        $detail = self::detailLangs()->where('lang_id',$langId)->withTrashed()->first();
        return !isset($detail->value)||$detail->value=='' ? self::detailLangs()->where('value','!=','')->withTrashed()->first() : $detail;
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTrashed();
    }

    public function detailValues()
    {
        return $this->hasMany('App\DetailValue');
    }

    public static function boot()
    {
        parent::boot();    

        // cause a delete of a detail to cascade to children so they are also deleted
        static::deleting(function($detail)
        {
            $detail->detailLangs()->delete();
            
        });

        static::restoring(function($detail)
        {
            $detail->detailLangs()->withTrashed()->restore();
        });
    }
}
