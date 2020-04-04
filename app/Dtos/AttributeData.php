<?php

namespace App\Dtos;
use Spatie\DataTransferObject\DataTransferObject;

class AttributeData extends DataTransferObject
{
    public $attributeName;
    public $value;

    public static function buildDto($attribute)
    {
        return new self([
            'attributeName' => $attribute['AttributeName'],
            'value' => $attribute['Value']
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
