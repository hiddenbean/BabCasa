<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Schema DB connection
use Illuminate\Support\Facades\Schema;
//Add a mapping for the polymorphic relationships
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         //Fixing "SQLSTATE[42000] - key was too long"
         Schema::defaultStringLength(191);
         Relation::morphMap([
            'partner' => 'App\Partner',
            'product' => 'App\Product',
            'picture' => 'App\Picture',
            'category' => 'App\Category',
            'address' => 'App\Address',
            'phone' => 'App\Phone',
            'claim' => 'App\Claim',
            'staff' => 'App\Staff',
         ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
