<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReasonLang extends Model
{
    function reason()
    {
        return $this->belingsTo('App\Reason');
    }
}
