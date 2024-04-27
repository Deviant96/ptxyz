<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;
use App\Policies\RolePolicy;
use App\User;
use App\Role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
