<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Define the gate for adding products
        Gate::define('add-product', function (User $user) {
            return $user->isAdmin || $user->isSuperAdmin;
        });

        // Define the gate for updating products
        Gate::define('update-product', function (User $user) {
            return $user->isAdmin || $user->isSuperAdmin;
        });

        // Define the gate for deleting products - only super admins
        Gate::define('delete-product', function (User $user) {
            return $user->isSuperAdmin;
        });
    }
}
