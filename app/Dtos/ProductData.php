<?php

namespace App\Dtos;
use Spatie\DataTransferObject\DataTransferObject;

class ProductData extends DataTransferObject
{
    //Base informations
    public $name;
    public $slug;
    public $productCode;
    public $warranty;
    public $return;
    public $delivery;
    public $price;
    public $discountPrice;
    public $discount;
    public $quantity;
    public $description;
    //Related Collections
    public $images;
    public $choosable;

    public static function buildDto($data)
    {
        return new self([
            'name' => $data['Name'],
            'slug' => $data['Slug'],
            'price' => $data['Price'],
            'discountPrice' => $data['DiscountPrice'],
            'productCode' => $data['ProductCode'],
            'warranty' => $data['Warranty'],
            'return' => $data['Return'],
            'delivery' => $data['Delivery'],
            'description' => $data['Description'],
            'discount' => $data['Discount'],
            'quantity' => $data['Quantity'],
            'images' => ImagesQuick::buildCollection($data['images']),
            'choosable' => ChoosableAttributeData::buildCollection($data['choosableList']->toArray())
        ]);
    }

    public static function buildCollection(array $arrayOfParameters): array
    {
        $objectsArray = array();

        foreach ($arrayOfParameters as $product)
        {
            array_push($objectsArray,self::buildDto($product));
        }

        return $objectsArray;
    }
}
