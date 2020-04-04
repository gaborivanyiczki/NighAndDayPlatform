<?php

namespace App\Dtos;
use Spatie\DataTransferObject\DataTransferObject;

class ProductQuick extends DataTransferObject
{
    public $name;
    public $slug;
    public $price;
    public $discountPrice;
    public $images;

    public static function buildDto($data)
    {
        return new self([
            'name' => $data['Name'],
            'slug' => $data['Slug'],
            'price' => $data['Price'],
            'discountPrice' => $data['DiscountPrice'],
            'images' => ImagesQuick::buildCollection($data['images'])
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
