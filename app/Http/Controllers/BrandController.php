<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\BrandsRepository;
use App\Repository\Eloquent\ProductsRepository;
use Illuminate\Http\Request;
use App\Dtos\ProductQuick;
use App\Helper\ProductHelper;
use App\ViewModels\BrandPageModel;

class BrandController extends Controller
{
    protected $brandRepo;
    protected $productRepo;

    public function __construct(BrandsRepository $brandsRepository, ProductsRepository $productRepository)
    {
        $this->brandRepo = $brandsRepository;
        $this->productRepo = $productRepository;
    }

    public function brandDetails($slug)
    {
        $brand = $this->brandRepo->getBrandBySlug($slug);
        $products = json_encode(ProductQuick::buildCollection($this->productRepo->getProductsByBrand($slug)));
        $products_count = $this->productRepo->getCountProductsByBrand($slug);

        $brandModel = json_encode(new BrandPageModel($brand, $products, $products_count));

        return view('brand.brand')->with('brandModel', json_decode($brandModel, true));
    }

    public function fetchBrandProducts(Request $request)
    {
        if($request->ajax())
        {
            $skip = $request->skip;
            $slug = $request->slug;
            $take = $request->take;
            $sort = ProductHelper::getSortingAttributes($request->sort);

            $products = ProductQuick::buildCollection($this->productRepo->getProductsByBrandFilter($slug, $skip, $take, $sort));

            return response()->json($products);
        }
        else
        {
            return response()->json('Access Not Allowed!');
        }
    }
}
