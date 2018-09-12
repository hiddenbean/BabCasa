<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BundleLang extends Model
{
    public function Bundle()
    {
        return $this->belongsTo('App\Bundle');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
