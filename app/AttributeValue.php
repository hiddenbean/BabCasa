<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AttributeValue extends Model
{  
    use LogsActivity;

    protected $fillable = ['type'];

    protected static $logFillable = true;

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "you have ". $eventName." a new attribute : <a href='attributes/".$this->id."'>Attribute</a>";
    }

    // Relationship with discount table
    public function discount()
    {
        return $this->belongsToMany('App/Discount');
    }

    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }

    public function product()
	{
		return $this->belongsTo('App\Product');
    }
    
    public function currency()
    {
        return $this->hasOne('App\Currency');
    }
    public function child()
    {
        return $this->hasOne('App\AttributeValue');
    }
    
    public function parent()
    {
        return $this->belongsTo('App\AttributeValue');
    }
    
    public function attributeVarcharValue()
    {
        return $this->hasOne('App\AttributeVarcharValue');
    }

    public function attributeDateValue()
    {
        return $this->hasOne('App\AttributeDateValue');
    }

    public function attributeDoubleValue()
    {
        return $this->hasOne('App\AttributeDoubleValue');
    }


    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }
}
