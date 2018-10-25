<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Language extends Model
{
    use LogsActivity;

    protected $fillable = ['name', 'alpha_2_code'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    public function attributeLang()
    {
        return $this->hasMany('App\AttributeLang');
    }
    
    public function attributeVarcharValueLang()
    {
        return $this->hasMany('App\AttributeVarcharValueLang');
    }

    public function bundleLangs()
    {
        return $this->hasMany('App\BundleLang');
    }

    public function categoryLang()
    {
        return $this->hasMany('App\CategoryLang');
    }
    public function discountLangs()
    {
        return $this->hasMany('App\DiscountLang');
    }
    public function detailLangs()
    {
        return $this->hasMany('App\DetailLang');
    }

    public function detailValueLangs()
    {
        return $this->hasMany('App\DetailValueLang');
    }
    public function productLangs()
    {
        return $this->hasMany('App\ProductLang');
    }
    public function tagLang()
    {
        return $this->hasMany('App\TagLang');
    } 

}
