<?php

namespace App\ViewModels;

use App\Dtos\AttributeGroupData;
use App\Product;
use Spatie\ViewModels\ViewModel;
use App\Dtos\ProductData;

class ProductViewModel extends ViewModel
{
    public $product;
    public $attributeGroups;

    public function __construct($product, $attributeGroups, $choosableAttributes)
    {
        $this->product = $product;
        $this->attributeGroups = $attributeGroups;
        $this->product->setAttribute('choosableList', $choosableAttributes);
        //Actions
        $this->setAttributeGroupsArray();
        $this->convertProductToDto($this->product);
        $this->convertAttributeGroupsToDto($this->attributeGroups);
    }

    public function product(): Product
    {
        return $this->product ?? new Product();
    }

    public function setAttributeGroupsArray()
    {
        foreach($this->attributeGroups as $element)
        {
            $productAttributes = $this->product->attributes;
            $attributesArray = array();

            foreach($productAttributes as $key => $attribute)
            {
                if($attribute->AttributeGroup == $element->id)
                {
                    array_push($attributesArray, $attribute);
                    unset($productAttributes[$key]);
                }
            }

            $element->setAttribute('attributeList', $attributesArray);
        }
    }

    public function convertProductToDto($product)
    {
        $this->product = ProductData::buildDto($product->toArray());
    }

    public function convertAttributeGroupsToDto($attributegroups)
    {
        $this->attributeGroups = AttributeGroupData::buildCollection($attributegroups->toArray());
    }
}
