<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
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
        view()->composer(
            'contact', 'App\Http\ViewComposers\ContactComposer'
        );
        view()->composer(
            'faq', 'App\Http\ViewComposers\FaqComposer'
        );
        view()->composer(
            'partials.technologies', 'App\Http\ViewComposers\TechnologiesComposer'
        );
        view()->composer(
            'partials.cart-icon', 'App\Http\ViewComposers\CartBadgeComposer'
        );
    }
}
