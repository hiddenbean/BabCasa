<?php

namespace App;
use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
        // Relationship with discount table
        public function discount()
        {
                return $this->belongsTo('App/Discount');
        }
        
        public function partner()
        {
                return $this->belongsTo('App/Partner');
        }
        
        public function productLangs()
        {
                return $this->hasMany('App\ProductLang');
        }

        public function tags()
        {
                return $this->belongsToMany('App\Tag');
        }

        public function bundles()
        {
                return $this->belongsToMany('App\Bundle');
        }

        public function discounts()
        {
                return $this->belongsToMany('App\Discount');
        }

        public function currency()
        {
                return $this->belongsTo('App\Currency');
        }

        public function detailValues()
        {
                return $this->hasMany('App\DetailValue');
        }

        public function picture()
        {
                return $this->morphOne('App\Picture', 'pictureable');
        }

        public function categories()
        {
                return $this->belongsToMany('App\Category');
        }

        public function productLang()
        {
            $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
            return $this->productLangs()->where('lang_id',$langId);
        }
    
        public function orders()
        {
                return $this->morphToMany('App\Order', 'orderable');
        }
}
