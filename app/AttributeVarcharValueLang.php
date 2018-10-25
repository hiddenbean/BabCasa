<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AttributeVarcharValueLang extends Model
{ 
    use LogsActivity;

    protected $fillable = ['type'];

    protected static $logFillable = true;

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "you have ". $eventName." a new attribute : <a href='attributes/".$this->id."'>Attribute</a>";
    }

    public function attributeVarcharValue()
    {
        return $this->belongsTo('App\AttributeVarcharValue');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
