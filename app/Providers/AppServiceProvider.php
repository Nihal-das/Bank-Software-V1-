<?php

namespace App\Providers;

use App\Listeners\StoreNavMenu;
use App\Services\NavigationService;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $modules = Auth::check()
                ? Cache::get('nav_modules_user_' . Auth::id(), collect())
                : collect();

            $view->with('modules', $modules);
        });
    }
}
