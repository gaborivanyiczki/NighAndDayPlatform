<?php

namespace App\Dtos;
use Spatie\DataTransferObject\DataTransferObject;

class ChoosableAttributeData extends DataTransferObject
{
    public $attributeName;
    public $value;
    public $attributeList;

    public static function buildDto($attribute)
    {
        return new self([
            'attributeName' => $attribute['AttributeName'],
            'value' => $attribute['Value'],
            'attributeList' => $attribute['attributeList']
        ]);
    }

    public static function buildCollection(array $arrayOfParameters): array
    {
        $objectsArray = array();

        foreach ($arrayOfParameters as $image)
        {
            array_push($objectsArray,self::buildDto($image));
        }

        return $objectsArray;
    }
}
