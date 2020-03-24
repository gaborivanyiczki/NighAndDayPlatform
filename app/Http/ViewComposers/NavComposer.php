<?php

namespace App\Http\ViewComposers;

use App\Repository\Eloquent\CategoriesRepository;
use App\Repository\Eloquent\SettingsRepository;
use App\Repository\SettingsRepositoryInterface;

class NavComposer
{
    protected $categories;

    public function __construct(CategoriesRepository $categories)
    {
        $this->categories = $categories;
    }

    public function compose($view)
    {
        $view->with('menu', $this->categories->getNavigationCategories());
    }
}
