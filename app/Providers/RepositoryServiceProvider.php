<?php

namespace App\Providers;

use App\Repository\AddressTypeRepositoryInterface;
use App\Repository\AttributeGroupsRepositoryInterface;
use App\Repository\BrandsRepositoryInterface;
use App\Repository\CategoriesRepositoryInterface;
use App\Repository\Eloquent\AddressTypeRepository;
use App\Repository\Eloquent\AttributeGroupsRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\SettingsRepositoryInterface;
use App\Repository\Eloquent\SettingsRepository;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\BrandsRepository;
use App\Repository\Eloquent\CategoriesRepository;
use App\Repository\Eloquent\ProductAttributeRepository;
use App\Repository\Eloquent\ProductsRepository;
use App\Repository\Eloquent\UserAddressRepository;
use App\Repository\ProductAttributeRepositoryInterface;
use App\Repository\ProductsRepositoryInterface;
use App\Repository\UserAddressRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);
        $this->app->bind(CategoriesRepositoryInterface::class, CategoriesRepository::class);
        $this->app->bind(ProductsRepositoryInterface::class, ProductsRepository::class);
        $this->app->bind(BrandsRepositoryInterface::class, BrandsRepository::class);
        $this->app->bind(AttributeGroupsRepositoryInterface::class, AttributeGroupsRepository::class);
        $this->app->bind(ProductAttributeRepositoryInterface::class, ProductAttributeRepository::class);
        $this->app->bind(UserAddressRepositoryInterface::class, UserAddressRepository::class);
        $this->app->bind(AddressTypeRepositoryInterface::class, AddressTypeRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
