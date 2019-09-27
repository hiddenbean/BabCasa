<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use LogsActivity;
    use SoftDeletes;

    protected $fillable = ['name', 'alpha_2_code'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        
        return "has {$eventName} the language ID : <u>{$this->id}</u>";
    }

    public function attributeLangs()
    {
        return $this->hasMany('App\AttributeLang','lang_id');
    }
    
    public function attributeVarcharValueLangs()
    {
        return $this->hasMany('App\AttributeVarcharValueLang','lang_id');
    }

    public function bundleLangs()
    {
        return $this->hasMany('App\BundleLang','lang_id');
    }

    public function categoryLangs()
    {
        return $this->hasMany('App\CategoryLang','lang_id');
    }
    public function discountLangs()
    {
        return $this->hasMany('App\DiscountLang','lang_id');
    }
    public function detailLangs()
    {
        return $this->hasMany('App\DetailLang','lang_id');
    }

    public function detailValueLangs()
    {
        return $this->hasMany('App\DetailValueLang','lang_id');
    }
    public function productLangs()
    {
        return $this->hasMany('App\ProductLang','lang_id');
    }
    public function tagLangs()
    {
        return $this->hasMany('App\TagLang','lang_id');
    } 

}
