<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Claim extends Model
{

    use LogsActivity;

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
      
        return "has {$eventName} the claim ID : <u><a href=".url('claims/'.$this->id).">{$this->id}</a></u>";
    }

    protected $fillable=[
        'title',
        'status',
        'subject_id',
        'staff_id',
        'claimable_type',
        'claimable_id',
    ];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function claimable()
    {
        return $this->morphTo()->withTrashed();
    }

    public function claimMessages()
    {
        return $this->hasMany('App\ClaimMessage');
    }
    
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a product to cascade to children so they are also deleted
        static::deleting(function($claim)
        {
            $claim->claimMessages()->delete();
        });

    }
}
