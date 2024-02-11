<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\ResetPassword;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define("admin_kab", function ($user) {
            return $user->hasRole(Role::ADMIN_KAB);
        });

        Gate::define("staff_kab", function ($user) {
            return $user->hasRole(Role::STAFF_KAB);
        });

        Gate::define("admin_kec", function ($user) {
            return $user->hasRole(Role::ADMIN_KEC);
        });

        Gate::define("staff_kec", function ($user) {
            return $user->hasRole(Role::STAFF_KEC);
        });

        Gate::define("admin_des", function ($user) {
            return $user->hasRole(Role::ADMIN_DES);
        });
        Gate::define("staff_des", function ($user) {
            return $user->hasRole(Role::STAFF_DESA);
        });


        ResetPassword::createUrlUsing(function ($user, string $token) {
            return url("/new-password?token=$token&email=$user->email");
        });
    }
}
