<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function (User $user) {
            return $user->role === 'admin' || $user->role === 'High Admin';
        });
        Gate::define('gudang', function (User $user) {
            return $user->role === 'penjaga gudang';
        });
        Gate::define('wakasek', function (User $user) {
            return $user->role === 'wakasek';
        });
        // Paginator::useBootstrap();
    }
}
