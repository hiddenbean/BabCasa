<?php

namespace App;

use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class DetailValue extends Model
{
    use LogsActivity;

    protected $fillable = ['product_id', 'detail_id'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
	}
	
	public function detailValueLangs()
	{
		return $this->hasMany('App\DetailValueLang');
	}
	public function detailValueLang()
	{
		$langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
		return $this->detailValueLangs()->where('lang_id',$langId);

	}

	public function product()
	{
		return $this->belongsTo('App\Product');
	}

	public function detail()
	{
		return $this->belongsTo('App\Detail');
	}
}
