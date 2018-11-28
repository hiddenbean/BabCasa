<?php

namespace App;
use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gender extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $fillable = ['type'];

    protected static $logFillable = true;

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    public function genderLangs()
    {
            return $this->hasMany('App\GenderLang')->withTrashed();
    }

    public function genderLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        $gender = self::genderLangs()->where('lang_id',$langId)->withTrashed()->first();
        return !isset($gender->reference) ? self::genderLangs()->where('reference','!=','')->first() : $gender;
    }
    public function staff()
    {
        return $this->hasMany('App\Staff');
    }

    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a gender to cascade to children so they are also deleted
        static::deleting(function($gender)
        {
            $gender->genderLangs()->delete();
            $gender->subCategories()->delete();
            
        });

        static::restoring(function($gender)
        {
            $gender->genderLangs()->withTrashed()->restore();
            $gender->subCategories()->withTrashed()->restore();
        });
    }

}
