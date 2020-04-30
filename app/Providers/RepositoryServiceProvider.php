<?php

namespace App\Providers;

use App\Repository\AddressTypeRepositoryInterface;
use App\Repository\AttributeGroupsRepositoryInterface;
use App\Repository\AttributeRepositoryInterface;
use App\Repository\AttributeValueRepositoryInterface;
use App\Repository\BrandsRepositoryInterface;
use App\Repository\CategoriesRepositoryInterface;
use App\Repository\Eloquent\AddressTypeRepository;
use App\Repository\Eloquent\AttributeGroupsRepository;
use App\Repository\Eloquent\AttributeRepository;
use App\Repository\Eloquent\AttributeValueRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\SettingsRepositoryInterface;
use App\Repository\Eloquent\SettingsRepository;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\BrandsRepository;
use App\Repository\Eloquent\CategoriesRepository;
use App\Repository\Eloquent\OrderRepository;
use App\Repository\Eloquent\ProductAttributeRepository;
use App\Repository\Eloquent\ProductsRepository;
use App\Repository\Eloquent\UserAddressRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\Eloquent\UserVouchersRepository;
use App\Repository\Eloquent\VoucherRepository;
use App\Repository\Eloquent\VoucherTypeRepository;
use App\Repository\OrderRepositoryInterface;
use App\Repository\ProductAttributeRepositoryInterface;
use App\Repository\ProductsRepositoryInterface;
use App\Repository\UserAddressRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use App\Repository\UserVouchersRepositoryInterface;
use App\Repository\VoucherRepositoryInterface;
use App\Repository\VoucherTypeRepositoryInterface;
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
        $this->app->bind(UserVouchersRepositoryInterface::class, UserVouchersRepository::class);
        $this->app->bind(AttributeRepositoryInterface::class, AttributeRepository::class);
        $this->app->bind(AttributeValueRepositoryInterface::class, AttributeValueRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(VoucherRepositoryInterface::class, VoucherRepository::class);
        $this->app->bind(VoucherTypeRepositoryInterface::class, VoucherTypeRepository::class);
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
