<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\User;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate;


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
        Gate::define('admin', function(User $user){
            return $user->type == 'admin';
        });

        Gate::define('wewenang', function(User $user)
        {
            return $user->type == 'wewenang';
        });

        Gate::define('user', function(User $user){
            return $user->type == 'user';
        });
    }
}
