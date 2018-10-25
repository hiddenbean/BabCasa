<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Discount extends Model
{
    use LogsActivity;

    protected $fillable = ['redaction_percentage', 'start_at', 'end_at', 'partner_id'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    // Relationship with discount langs table
    public function discountLangs()
    {
        return $this->hasMany('App/DiscountLang');
    }

    // Relationship with product table
    public function products()
    {
        return $this->belongsToMany('App/Product')->withPivot('quantity');
    }

    // Relationship with bundle table
    public function bundles()
    {
        return $this->belongsToMany('App/Bundle');
    }

    // Relationship with attribute value table
    public function attributeValues()
    {
        return $this->belongsToMany('App/AttributeValue');
    }

    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }
    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }
}
