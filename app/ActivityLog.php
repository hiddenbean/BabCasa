<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{

    protected $table = 'activity_log';
    public function logable()
    {
        return $this->morphTo();
    }
}
