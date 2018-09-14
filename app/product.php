<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        // Relationship with discount table
        public function discount()
        {
                return $this->belongsTo('App/Discount');
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

        public function currencie()
        {
                return $this->hasOne('App\Currencie');
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

        public function orders()
        {
                return $this->morphToMany('App\Order', 'orderable');
        }
}
