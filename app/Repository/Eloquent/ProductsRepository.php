<?php

namespace App\Repository\Eloquent;

use App\Product;
use App\Repository\ProductsRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class ProductsRepository extends BaseRepository implements ProductsRepositoryInterface
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getFavoriteProducts()
    {
        return $this->model->where([ ['Favorite', 1],['Active', 1] ])
                            ->with(['images' => function($query) { $query->select('Path','Filename','Product_ID')->where('default', 1); }])
                            ->select('Name','Slug','Price','DiscountPrice','id')
                            ->take(8)
                            ->get()->toArray();
    }

    public function getNewProducts()
    {
        return $this->model->with(['images' => function($query) { $query->select('Path', 'Filename','Product_ID')->where('Default', 1); }])
                            ->where('Active', 1)
                            ->select('Name','Slug','Price','DiscountPrice','id')
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get()->toArray();
    }

    public function findProductBySlug($slug)
    {
        return $this->model->with(['images' => function($query) { $query->select('Path', 'Filename','Product_ID','Default'); }])
                            ->with(['attributes' => function($query){ $query->join('attributes', 'attributes.id', '=', 'product_attributes.Attribute_ID')
                                                                            ->join('attribute_values', 'attribute_values.id', '=', 'product_attributes.Attribute_Value_ID')
                                                                            ->select('Product_ID', 'product_attributes.Attribute_ID as Attribute', 'Product_Attribute_Group_ID as ProductAttributeGroup' ,'attributes.Attribute_Group_ID as AttributeGroup' ,'attributes.Name as AttributeName','attribute_values.Value as Value','attributes.Choosable as Choosable'); }])
                            ->where('Slug', $slug)->first();
    }

    public function findProductById($id)
    {
        return $this->model->with(['images' => function($query) { $query->where('Default',1)->select('Path', 'Filename','Product_ID','Default'); }])
                            ->where('id', $id)->first();

    }

    public function getProductIdBySlug($slug)
    {
        return $this->model->where('Slug', $slug)
                            ->select('id')
                            ->first();
    }

    public function getSimilarProducts($slug, $category)
    {
        return $this->model->where([ ['Slug', '!=', $slug],['Category_ID', $category] ])
                            ->with(['images' => function($query) { $query->select('Path', 'Filename','Product_ID')->where('Default', 1); }])
                            ->select('Name','Slug','Price','DiscountPrice','id')
                            ->take(6)
                            ->get()->toArray();
    }

    public function getOtherProducts($slug)
    {
        return $this->model->where([ ['Slug', '!=', $slug],['Favorite', 1],['Active', 1] ])
                            ->with(['images' => function($query) { $query->select('Path','Filename','Product_ID')->where('Default', 1); }])
                            ->select('Name','Slug','Price','DiscountPrice','id')
                            ->take(6)
                            ->get()->toArray();
    }

    public function getProductsByCategory($slug)
    {
        return $this->model->with(['images' => function($query) { $query->select('Path','Filename','Product_ID')->where('Default', 1); }])
                            ->join('categories', 'categories.id', '=', 'Category_ID')
                            ->where([['products.Active', 1], ['categories.Slug', $slug]])
                            ->select('products.Name as Name','products.Slug as Slug','Price','DiscountPrice','products.id as id')
                            ->take(12)
                            ->get()->toArray();
    }

    public function getCountProductsByCategory($slug)
    {
        return $this->model->join('categories', 'categories.id', '=', 'Category_ID')
                            ->where([['products.Active', 1], ['categories.Slug', $slug]])
                            ->count();
    }

    public function getProductsByFilter($categorySlug, $skip, $take, array $sort)
    {
        return $this->model->with(['images' => function($query) { $query->select('Path','Filename','Product_ID')->where('Default', 1); }])
                            ->join('categories', 'categories.id', '=', 'Category_ID')
                            ->where([['products.Active', 1], ['categories.Slug', $categorySlug]])
                            ->select('products.Name as Name','products.Slug as Slug','Price','DiscountPrice','products.id as id')
                            ->skip($skip)
                            ->take($take)
                            ->orderBy('products.'.$sort['SortColumn'], $sort['SortBy'])
                            ->get()->toArray();
    }

    public function findParticularProductBySlug($slug)
    {
        return $this->model->with(['images' => function($query) { $query->select('Path', 'Filename','Product_ID','Default')->where('Default', 1)->first(); }])
                            ->where('Slug', $slug)
                            ->select('id', 'Name', 'Price', 'DiscountPrice', 'Slug')
                            ->first();

    }

    public function getProductNameById($id)
    {
        return $this->model->where('id', $id)
                            ->select('Name')
                            ->first();
    }

    public function getActiveProductsForSelect()
    {
        return $this->model->where('Active', 1)
                            ->select('id','Name')
                            ->get();

    }
}
