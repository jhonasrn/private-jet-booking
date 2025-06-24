<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    public function redirectTo()
    {
        $role = auth()->user()?->role;

        return match ($role) {
            'admin' => '/admin/dashboard',
            'pilot' => '/pilot/dashboard',
            'client' => '/client/dashboard',
            default => '/dashboard',
        };
    }
}