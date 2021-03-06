<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\AttributeGroupsRepository;
use App\Repository\Eloquent\ProductsRepository;
use App\Repository\Eloquent\ProductAttributeRepository;
use App\ViewModels\ProductViewModel;
use App\Dtos\ProductQuick;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepo;
    protected $attributeGroupRepo;
    protected $attributeRepo;

    public function __construct(ProductsRepository $productRepository, AttributeGroupsRepository $attributeGroupsRepo, ProductAttributeRepository $attributeRepository)
    {
        $this->productRepo = $productRepository;
        $this->attributeGroupRepo = $attributeGroupsRepo;
        $this->attributeRepo = $attributeRepository;
    }

    public function details($slug)
    {
        $product = $this->productRepo->findProductBySlug($slug);

        $attributeGroups = $this->attributeGroupRepo->getAttributeGroups();

        $choosableAttributes = $product->attributes->where('Choosable', 1);

        foreach($choosableAttributes as $attribute)
        {
            $attributes = $this->attributeRepo->getChoosableAttributes($attribute->ProductAttributeGroup, $attribute->Attribute);
            $attribute->setAttribute('attributeList', $attributes->where('Slug', '!=', $slug));
        }

        $productModel = json_encode(new ProductViewModel($product, $attributeGroups, $choosableAttributes));
        $similarProducts = json_encode(ProductQuick::buildCollection($this->productRepo->getSimilarProducts($slug, $product->Category_ID)));
        $otherProducts = json_encode(ProductQuick::buildCollection($this->productRepo->getOtherProducts($slug)));

        return view('product.product', compact('similarProducts','otherProducts'))->with('productModel', json_decode($productModel, true));
    }
}
