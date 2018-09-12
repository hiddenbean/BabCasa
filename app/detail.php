<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    public function detailLangs()
    {
            return $this->hasMany('App\Detail_lang');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Categorie');
    }
}
