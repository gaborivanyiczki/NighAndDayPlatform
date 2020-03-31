<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface ProductAttributeRepositoryInterface
{
    public function getChoosableAttributes($productAttributeGroup, $attribute);
}
