<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    // SoftDeletes : pour supprimer  des sujets logiquement au bass de donnes
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    // end softDelete

    public function claims()
    {
            return $this->hasMany('App\Claim');
    }
}
