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
        return "has {$eventName} the message ID : <u><a href=".url('claims/'.$this->claim_id)."><{$this->id}</a></u>";
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
