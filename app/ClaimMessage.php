<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ClaimMessage extends Model
{
    use LogsActivity;

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    protected $fillable=[
        'message',
        'status',
        'claim_messageable_type',
        'claim_messageable_id',
        'claim_id',
    ];

    public function claim()
    {
        return $this->belongsTo('App\Claim');
    }

    public function claimMessageable()
    {
        return $this->morphTo()->withTrashed();
    }
}
