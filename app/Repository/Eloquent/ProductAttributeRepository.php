<?php

namespace App\Repository\Eloquent;

use App\ProductAttribute;
use App\Repository\ProductAttributeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class ProductAttributeRepository extends BaseRepository implements ProductAttributeRepositoryInterface
{
    protected $model;

    public function __construct(ProductAttribute $attribute)
    {
        $this->model = $attribute;
    }

    public function getChoosableAttributes($productAttributeGroup, $attribute)
    {
        return $this->model->where([ ['Product_Attribute_Group_ID', $productAttributeGroup],['Attribute_ID', $attribute] ])
                            ->join('products', 'products.id', '=', 'Product_ID')
                            ->select('products.Slug','Value')
                            ->get();
    }
}
