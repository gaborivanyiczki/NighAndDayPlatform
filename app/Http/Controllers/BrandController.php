<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\BrandsRepository;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brandRepo;

    public function __construct(BrandsRepository $brandsRepository)
    {
        $this->brandRepo = $brandsRepository;
    }

    public function brandDetails($slug)
    {
        $brand = json_encode($this->brandRepo->getBrandBySlug($slug));

        //$categoryPageModel = json_encode(new CategoryPageModel($category, $products, $products_count));

        return view('brand.brand')->with('brandModel', json_decode($brand, true));
    }
}
