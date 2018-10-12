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

    public function orders()
    {
        return $this->morphMany('App\Order', 'costumer');
    }
   

    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a product to cascade to children so they are also deleted
        static::deleting(function($particular_client)
        {
            $particular_client->address()->delete();
            $particular_client->picture()->delete();
            $particular_client->phones()->delete();
            
        });

        static::restoring(function($particular_client)
        {
            $particular_client->address()->withTrashed()->restore();
            $particular_client->picture()->withTrashed()->restore();
            $particular_client->phones()->withTrashed()->restore();
        });
    }
}
