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
        return json_encode($this->model->where([ ['Favorite', 1],['Active', 1] ])
                            ->with(['images' => function($query) { $query->select('Path','Filename','Product_ID')->where('default', 1); }])
                            ->select('Name','Slug','Price','DiscountPrice','id')
                            ->take(8)
                            ->get(), JSON_PRETTY_PRINT);
    }

    public function getNewProducts()
    {
        return json_encode($this->model->with(['images' => function($query) { $query->select('Path', 'Filename','Product_ID')->where('default', 1); }])
                                        ->select('Name','Slug','Price','DiscountPrice','id')
                                        ->orderBy('created_at', 'desc')
                                        ->take(5)
                                        ->get() ,JSON_PRETTY_PRINT);
    }

    public function findProductBySlug($slug)
    {
        return $this->model->with(['images' => function($query) { $query->select('Path', 'Filename','Product_ID','Default'); }])
                            ->with(['attributes' => function($query){ $query->join('attributes', 'attributes.id', '=', 'Attribute_ID')
                                                                            ->select('Product_ID', 'Attribute_ID as Attribute', 'Product_Attribute_Group_ID as ProductAttributeGroup' ,'attributes.Attribute_Group_ID as AttributeGroup' ,'attributes.Name as AttributeName','Value','attributes.Choosable as Choosable'); }])
                            ->where('Slug', $slug)->first();

    }

    public function getSimilarProducts($slug, $category)
    {
        return json_encode($this->model->where([ ['Slug', '!=', $slug],['Category_ID', $category] ])
                            ->with(['images' => function($query) { $query->select('Path', 'Filename','Product_ID')->where('default', 1); }])
                            ->select('Name','Slug','Price','DiscountPrice','id')
                            ->take(6)
                            ->get() , JSON_PRETTY_PRINT);
    }

    public function getOtherProducts($slug)
    {
        return json_encode($this->model->where([ ['Slug', '!=', $slug],['Favorite', 1],['Active', 1] ])
                            ->with(['images' => function($query) { $query->select('Path','Filename','Product_ID')->where('default', 1); }])
                            ->select('Name','Slug','Price','DiscountPrice','id')
                            ->take(6)
                            ->get(), JSON_PRETTY_PRINT);
    }

    public function getProductsByCategory($slug)
    {
        return json_encode($this->model->with(['images' => function($query) { $query->select('Path','Filename','Product_ID')->where('default', 1); }])
                            ->join('categories', 'categories.id', '=', 'Category_ID')
                            ->where([['products.Active', 1], ['categories.Slug',$slug]])
                            ->select('products.Name','products.Slug','Price','DiscountPrice','products.id')
                            ->take(10)
                            ->get(), JSON_PRETTY_PRINT);
    }
}
