<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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

    public function boot()
    {
        Schema::defaultStringLength(191); // Maksimal uzunlikni 191 belgi bilan cheklang
        View::share('defaultimage', asset('assets/imgs/default/default.webp'));
    }

}
