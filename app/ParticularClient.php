<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParticularClient extends Model
{
    use SoftDeletes;  

    public function address()
    {
        return $this->morphOne('App\Address', 'addressable');
    }

    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }

    public function phones()
    {
        return $this->morphMany('App\Phone', 'phoneable');
    }
   

    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a product to cascade to children so they are also deleted
        static::deleting(function($particularClient)
        {
            $particularClient->address()->delete();
            $particularClient->picture()->delete();
            $particularClient->phones()->delete();
            
        });

        static::restoring(function($particularClient)
        {
            $particularClient->address()->withTrashed()->restore();
            $particularClient->picture()->withTrashed()->restore();
            $particularClient->phones()->withTrashed()->restore();
        });
    }
}
