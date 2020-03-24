<?php

namespace App\Http\ViewComposers;

use App\Repository\Eloquent\ProductsRepository;

class FavoriteProductsComposer
{
    protected $products;

    public function __construct(ProductsRepository $products)
    {
        $this->products = $products;
    }

    public function compose($view)
    {
        $view->with('favoriteproducts', $this->products->getFavoriteProducts());
    }
}
