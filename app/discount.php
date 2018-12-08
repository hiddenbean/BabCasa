<?php

namespace App;
use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;


class Discount extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = ['percentage', 'start_at', 'end_at', 'partner_id'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "has {$eventName} the discount ID : <u><a href=".url('discounts/'.$this->id).">{$this->id}</a></u>";
    }

    // Relationship with discount langs table
    public function discountLangs()
    {
        return $this->hasMany('App\DiscountLang')->withTrashed();
    }
    public function discountLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        $discount = self::discountLangs()->where('lang_id',$langId)->first();

        return !isset($discount->reference)||$discount->reference=='' ? self::discountLangs()->where('reference','!=','')->first() : $discount;

    }

    // Relationship with product table
    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity');
    }

    // Relationship with bundle table
    public function bundles()
    {
        return $this->belongsToMany('App\Bundle');
    }

    // Relationship with attribute value table
    public function attributeValues()
    {
        return $this->belongsToMany('App\AttributeValue');
    }

    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }
    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }
    public static function boot()
    {
        parent::boot();    

        // cause a delete of a discount to cascade to children so they are also deleted
        static::deleting(function($discount)
        {
            $discount->discountLangs()->delete();
            
        });

        static::restoring(function($discount)
        {
            $discount->discountLangs()->withTrashed()->restore();
        });
    }
}
