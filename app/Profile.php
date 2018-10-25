<?php

namespace App;

use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
	use SoftDeletes;
	use LogsActivity;

	protected $fillable = [];

	protected static $recordEvents = ['deleted', 'created', 'updated'];

	protected static $logFillable = true;

	public function getDescriptionForEvent(string $eventName): string
	{
		return "This model has been ". $eventName;
	}
	
    public function profileLangs()
    {
            return $this->hasMany('App\ProfileLang')->withTrashed();
    }

    public function profileLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        $profile = self::profileLangs()->where('lang_id',$langId)->first();

        return !isset($profile->reference) ? self::profileLangs()->where('reference','!=','')->first() : $profile;
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission')->withPivot('can_read', 'can_write');
    }
    public function staff()
    {
        return $this->hasMany('App\Staff');
    }
}
