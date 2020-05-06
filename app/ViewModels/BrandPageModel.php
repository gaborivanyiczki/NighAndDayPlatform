<?php

namespace App\ViewModels;

use App\Brand;
use Spatie\ViewModels\ViewModel;

class BrandPageModel extends ViewModel
{
    public $brand;
    public $products;
    public $productsCount;

    public function __construct($brand, $products, $products_count)
    {
        $this->brand = $brand;
        $this->products = $products;
        $this->productsCount = $products_count;
    }

    public function brand(): Brand
    {
        return $this->brand ?? new Brand();
    }
}
