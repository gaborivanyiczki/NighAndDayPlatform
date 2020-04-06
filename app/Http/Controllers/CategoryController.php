<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\CategoriesRepository;
use App\Repository\Eloquent\ProductsRepository;
use App\Dtos\ProductQuick;
use App\Helper\ProductHelper;
use App\ViewModels\CategoryPageModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepo;
    protected $productRepo;

    public function __construct(ProductsRepository $productRepository, CategoriesRepository $categoryRepo)
    {
        $this->productRepo = $productRepository;
        $this->categoryRepo = $categoryRepo;
    }

    public function products($slug)
    {
        $category = $this->categoryRepo->getCategoryBySlug($slug);
        $products = json_encode(ProductQuick::buildCollection($this->productRepo->getProductsByCategory($slug)));
        $products_count = $this->productRepo->getCountProductsByCategory($slug);

        $categoryPageModel = json_encode(new CategoryPageModel($category, $products, $products_count));

        return view('category.category')->with('categoryModel', json_decode($categoryPageModel, true));
    }

    public function fetchProducts(Request $request)
    {
        if($request->ajax())
        {
            $skip = $request->skip;
            $slug = $request->slug;
            $take = $request->take;
            $sort = ProductHelper::getSortingAttributes($request->sort);

            $products = ProductQuick::buildCollection($this->productRepo->getProductsByFilter($slug, $skip, $take, $sort));

            return response()->json($products);
        }
        else
        {
            return response()->json('Access Not Allowed!');
        }
    }
}
