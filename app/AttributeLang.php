<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\CausesActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeLang extends Model
{
    use SoftDeletes;  
    use CausesActivity;  
    protected $fillable = ['reference', 'description', 'attribute_id', 'lang_id'];

    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }
    public function lang()
    {
        return $this->belongsTo('App\Language');
    }
}
