<?php

namespace App\Http\ViewComposers;

use App\Repository\Eloquent\BrandsRepository;
use App\Repository\Eloquent\CategoriesRepository;

class NavComposer
{
    protected $categories;
    protected $brands;

    public function __construct(CategoriesRepository $categories, BrandsRepository $brands)
    {
        $this->categories = $categories;
        $this->brands = $brands;
    }

    public function compose($view)
    {
        $view->with('menu', $this->categories->getNavigationCategories())
             ->with('brands', $this->brands->getNavigationBrands());
    }
}
