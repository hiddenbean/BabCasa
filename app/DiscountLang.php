<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class DiscountLang extends Model
{
    use LogsActivity;

    protected $fillable = ['reference', 'description', 'discount_id', 'lang_id'];

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
    
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
