<?php

namespace App\Providers;

use App\Policies\PermissionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Permission' => 'App\Policies\PermissionPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('permissions', 'App\Policies\PermissionPolicy');
        Gate::define('read', 'App\Policies\PermissionPolicy@read');
        Gate::define('write', 'App\Policies\PermissionPolicy@write');
        // Gate::define('update-post', function ($user){return true;});
    }
}
