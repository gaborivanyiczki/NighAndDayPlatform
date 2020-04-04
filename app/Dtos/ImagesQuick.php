<?php

namespace App\Dtos;
use Spatie\DataTransferObject\DataTransferObject;

class ImagesQuick extends DataTransferObject
{
    public $path;
    public $filename;

    public static function buildDto($image)
    {
        return new self([
            'path' => $image['Path'],
            'filename' => $image['Filename']
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
