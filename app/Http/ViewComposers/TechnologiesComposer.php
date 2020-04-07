<?php

namespace App\Http\ViewComposers;

use App\Repository\Eloquent\BrandsRepository;

class TechnologiesComposer
{
    protected $brands;

    public function __construct(BrandsRepository $brands)
    {
        $this->brands = $brands;
    }

    public function compose($view)
    {
        $view->with('data', json_encode($this->brands->getWidgetBrands()));
    }
}
