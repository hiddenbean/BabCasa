<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaimMessage extends Model
{
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
