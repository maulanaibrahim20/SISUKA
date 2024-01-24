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

        Gate::define("admin", function ($user) {
            return $user->hasRole(Role::ADMIN_APP);
        });

        Gate::define("mua", function ($user) {
            return $user->hasRole(Role::MAKEUP_BOS);
        });

        Gate::define("client", function ($user) {
            return $user->hasRole(Role::MEMBER);
        });

        ResetPassword::createUrlUsing(function ($user, string $token) {
            return url("/new-password?token=$token&email=$user->email");
        });
    }
}
