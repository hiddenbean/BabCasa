<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    protected $fillable = ['costumer_id', 'costumer_type', 'status', 'paiement_id', 'address_id', 'partner_id'];
    
    public function products()
    {
        return $this->morphedByMany('App\Product', 'orderable');
    }

    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }

    public function costumer()
    {
        return $this->morphTo();
    }
}
