<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;  

    protected $fillable = ['address', 'address_two', 'full_name', 'country_id   ', 'city', 'zip_code', 'longitude', 'latitude', 'addressable_type', 'addressable_id'];
    public function addressable()
    {
        return $this->morphTo();
    }
}
