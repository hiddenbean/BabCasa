<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductLang extends Model
{
    use LogsActivity;

    protected $fillable = ['reference', 'description', 'short_description', 'product_id', 'lang_id'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
