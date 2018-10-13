<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;
use App\Language;
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
    function subjectLangs()
    {
        return $this->hasMany('App\SubjectLang');
    }
    public function subjectLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        return $this->subjectLangs()->where('lang_id',$langId);

    }

    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a subject to cascade to children so they are also deleted
        static::deleting(function($subject)
        {
            $subject->subjectLangs()->delete();
            
        });

        static::restoring(function($subject)
        {
            $subject->subjectLangs()->withTrashed()->restore();
        });
    }
}
