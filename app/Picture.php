<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Picture extends Model
{
    use SoftDeletes;
    

    protected $fillable = ['name', 'tag', 'extension', 'path', 'pictureable_type', 'pictureable_id'];
    
    public function pictureable()
    {
        return $this->morphTo();
    }
}
