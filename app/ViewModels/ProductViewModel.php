<?php

namespace App\ViewModels;
use App\Product;
use Spatie\ViewModels\ViewModel;

class ProductViewModel extends ViewModel
{
    public $product;
    public $attributeGroups;

    public function __construct($product, $attributeGroups, $choosableAttributes)
    {
        $this->product = $product;
        $this->attributeGroups = $attributeGroups;
        $this->product->setAttribute('choosableList', $choosableAttributes);
        $this->setAttributeGroupsArray();
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
}
