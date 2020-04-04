<?php

namespace App\ViewModels;

use App\Category;
use Spatie\ViewModels\ViewModel;

class CategoryPageModel extends ViewModel
{
    public $category;
    public $products;
    public $productsCount;

    public function __construct($category, $products, $products_count)
    {
        $this->category = $category;
        $this->products = $products;
        $this->productsCount = $products_count;
    }

    public function category(): Category
    {
        return $this->category ?? new Category();
    }
}
