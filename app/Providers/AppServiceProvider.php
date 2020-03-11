<?php

namespace App\Providers;

use App\GlobalSettings;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('partials.header', function($view)
        {
            $view->with('data', GlobalSettings::where('filter','header')->get());
        });
    }
}
