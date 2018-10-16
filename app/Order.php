<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['reference', 'costumer_type', 'costumer_id', 'paiement_id', 'address_id'];
    
    public function products()
    {
        return $this->morphedByMany('App\Product', 'orderable');
    }
}
