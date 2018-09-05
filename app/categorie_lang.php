<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Categorie_lang extends Model
{
    use SoftDeletes;  

    public function categories()
    {
        return $this->belongsTo('App\Categorie');
    }
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}
