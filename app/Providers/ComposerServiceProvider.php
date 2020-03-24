<?php

namespace App\Providers;

use App\GlobalSettings;
use App\Repository\SettingsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    protected $settings;

   // public function __construct(SettingsRepositoryInterface $settings)
   // {
   //     $this->settings = $settings;
   // }
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
        view()->composer(
            'partials.nav', 'App\Http\ViewComposers\NavComposer'
        );
        view()->composer(
            ['partials.header','partials.footer'], 'App\Http\ViewComposers\LayoutComposer'
        );
        view()->composer(
            'partials.favoriteproducts', 'App\Http\ViewComposers\FavoriteProductsComposer'
        );
        view()->composer(
            'partials.newproducts', 'App\Http\ViewComposers\NewProductsComposer'
        );
    }
}
