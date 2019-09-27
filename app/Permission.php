<?php

namespace App;

use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
	use SoftDeletes;
    use LogsActivity;

    protected $fillable = ['type'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "has {$eventName} the permission ID : <u>{$this->id}</u>";
	}
	
    public function permissionLangs()
    {
	    return $this->hasMany('App\PermissionLang');
    }

    public function permissionLang()
    {        
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        $permission = self::permissionLangs()->where('lang_id',$langId)->withTrashed()->first();
        return !isset($permission->reference) ? self::permissionLangs()->where('reference','!=','')->withTrashed()->first() : $permission;
    }

    public function profiles()
    {
	    return $this->belongsToMany('App\Profile')->withPivot('can_read', 'can_write');
    }

}
