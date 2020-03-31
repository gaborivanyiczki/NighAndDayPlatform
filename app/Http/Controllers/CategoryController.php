<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\AttributeGroupsRepository;
use App\Repository\Eloquent\CategoriesRepository;
use App\Repository\Eloquent\ProductsRepository;
use App\Repository\Eloquent\ProductAttributeRepository;
use App\ViewModels\ProductViewModel;
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
        $products = $this->productRepo->getProductsByCategory($slug);

        return view('category.category', compact('products'));
    }
}
