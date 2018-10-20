<?php

namespace App;

use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;

class DetailValue extends Model
{
	public function detailValueLangs()
	{
		return $this->hasMany('App\DetailValueLang');
	}
	public function detailValueLang()
	{
		$langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
		return $this->detailValueLangs()->where('lang_id',$langId);

	}

	public function prodcut()
	{
		return $this->belongsTo('App\Products');
	}

	public function detail()
	{
		return $this->belongsTo('App\Detail');
	}
}
