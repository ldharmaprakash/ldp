<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach (glob(app_path() . '/Helpers/*.php') as $file) {
            require_once($file);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        $this->registerBladeDirectives();
    }

    /**
     * Register Custom Blade Directives
     *
     */
    protected function registerBladeDirectives(): void
    {
        // Blade Directive to check Permission of current Admin User
        \Blade::if('checkPermission', function($permission) {
            return auth()->user()->can($permission);
        });
    }
}
