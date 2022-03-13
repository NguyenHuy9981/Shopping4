<?php

namespace App\Providers;

use App\Permission;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // CATEGORY
        Gate::define('list-category', 'App\Policies\CategoryPolicy@view');

        Gate::define('add-category','App\Policies\CategoryPolicy@create');

        Gate::define('edit-category','App\Policies\CategoryPolicy@update');

        Gate::define('delete-category','App\Policies\CategoryPolicy@delete');

        // MENU
        Gate::define('list-menu', 'App\Policies\MenuPolicy@view');

        Gate::define('add-menu','App\Policies\MenuPolicy@create');

        Gate::define('edit-menu','App\Policies\MenuPolicy@update');

        Gate::define('delete-menu','App\Policies\MenuPolicy@delete');

    }
}
