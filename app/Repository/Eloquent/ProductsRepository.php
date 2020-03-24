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
}
