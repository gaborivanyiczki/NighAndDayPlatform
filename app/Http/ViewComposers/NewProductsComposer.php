<?php

namespace App\Http\ViewComposers;

use App\Repository\Eloquent\ProductsRepository;
use App\Dtos\ProductQuick;

class NewProductsComposer
{
    protected $products;

    public function __construct(ProductsRepository $products)
    {
        $this->products = $products;
    }

    public function compose($view)
    {
        $view->with('newproducts', json_encode(ProductQuick::buildCollection($this->products->getNewProducts())));
    }
}
