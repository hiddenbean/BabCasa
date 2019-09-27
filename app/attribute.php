<?php

namespace App;
use App\Language;
use App;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use SoftDeletes;  
    use LogsActivity;

    protected $fillable = ['type'];

    protected static $logFillable = true;

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "has {$eventName} the attribute ID : <u><a href=".url('attributes/'.$this->id).">{$this->id}</a></u>";
    }


    public function attributeLangs()
    {
            return $this->hasMany('App\AttributeLang')->withTrashed();
    }
    public function attributeLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        $attribute = self::attributeLangs()->where('lang_id',$langId)->withTrashed()->first();
        return !isset($attribute->reference)|| $attribute->reference=='' ? self::attributeLangs()->where('reference','!=','')->withTrashed()->first() : $attribute;
    }
    
    public function attributeValues()
    {
        return $this->hasMany('App\AttributeValue');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a attribute to cascade to children so they are also deleted
        static::deleting(function($attribute)
        {
            $attribute->attributeLangs()->delete();
            
        });

        static::restoring(function($attribute)
        {
            $attribute->attributeLangs()->withTrashed()->restore();
        });
    }
}
