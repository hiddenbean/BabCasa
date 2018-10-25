<?php

namespace App;
use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;
	use LogsActivity;

	protected $fillable = ['price', 'for_business', 'quantity', 'country_id', 'partner_id'];

	protected static $recordEvents = ['deleted', 'created', 'updated'];

	protected static $logFillable = true;

	public function getDescriptionForEvent(string $eventName): string
	{
			return "This model has been ". $eventName;
	}

	// Relationship with discount table
	public function discount()
	{
			return $this->belongsTo('App\Discount');
	}
	
	public function partner()
	{
			return $this->belongsTo('App\Partner');
	}
	
	public function productLangs()
	{
			return $this->hasMany('App\ProductLang');
	}

	public function productLang()
	{
			$langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
			$product = self::productLangs()->where('lang_id',$langId)->first();

			return !$product->reference ? self::productLangs()->where('reference','!=','')->first() : $product;
	}

	public function tags()
	{
			return $this->belongsToMany('App\Tag');
	}

	public function bundles()
	{
			return $this->belongsToMany('App\Bundle');
	}

	public function discounts()
	{
			return $this->belongsToMany('App\Discount')->withPivot('quantity');
	}

	public function country()
	{
			return $this->belongsTo('App\Country');
	}

	public function detailValues()
	{
			return $this->hasMany('App\DetailValue');
	}

	public function attributeValues()
	{
			return $this->hasMany('App\AttributeValue');
	}

	public function picture()
	{
			return $this->morphOne('App\Picture', 'pictureable');
	}

	public function categories()
	{
			return $this->belongsToMany('App\Category');
	}

	public function orders()
	{
			return $this->morphToMany('App\Order', 'orderable');
	}
}
