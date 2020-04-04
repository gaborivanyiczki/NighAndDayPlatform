<?php

namespace App\Dtos;
use Spatie\DataTransferObject\DataTransferObject;

class AttributeGroupData extends DataTransferObject
{
    public $attributeGroupName;
    public $attributeList;

    public static function buildDto($attribute)
    {
        return new self([
            'attributeGroupName' => $attribute['Name'],
            'attributeList' => AttributeData::buildCollection($attribute['attributeList'])
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
