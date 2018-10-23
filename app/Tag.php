<?php

namespace App;
use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tag extends Model
{
    use SoftDeletes;

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    public function tagLangs()
    {
        return $this->hasMany('App\TagLang')->withTrashed();
    } 
    
    public function tagLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        $tag = self::tagLangs()->where('lang_id',$langId)->withTrashed()->first();
        return !$tag->tag ? self::tagLangs()->where('tag','!=','')->withTrashed()->first() : $tag;

    }

    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a tag to cascade to children so they are also deleted
        static::deleting(function($tag)
        {
            $tag->tagLangs()->delete();
            
        });

        static::restoring(function($tag)
        {
            $tag->tagLangs()->withTrashed()->restore();
        });
    }
}
