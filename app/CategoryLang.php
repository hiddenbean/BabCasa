<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;


class CategoryLang extends Model
{
    // use SoftDeletes;  

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
