<?php

namespace App;
use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = ['category_id'];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        
        return "has {$eventName} the categorie ID : <u><a href=".url('categories/'.$this->id).">{$this->id}</a></u>";
    }

    public function categoryLangs()
    {
            return $this->hasMany('App\CategoryLang')->withTrashed();
    }

    public function categoryLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        $category = self::categoryLangs()->where('lang_id',$langId)->withTrashed()->first();
        return !isset($category->reference) ? self::categoryLangs()->where('reference','!=','')->first() : $category;
    }

    public function subCategories()
    {
            return $this->hasMany('App\Category');
    }

    public function category()
    {
        return $this->belongsTo('App\Category')->withTrashed();
    }
    
    public function attributes()
    {
        return $this->belongsToMany('App\Attribute');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    
    public function details()
    {
        return $this->belongsToMany('App\Detail');
    }
    
    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }

    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a category to cascade to children so they are also deleted
        static::deleting(function($category)
        {
            $category->categoryLangs()->delete();
            $category->subCategories()->delete();
            
        });

        static::restoring(function($category)
        {
            $category->categoryLangs()->withTrashed()->restore();
            $category->subCategories()->withTrashed()->restore();
        });
    }
}
