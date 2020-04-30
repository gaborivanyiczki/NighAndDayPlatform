<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface AttributeValueRepositoryInterface
{
    public function getAttributeValuesByAttributeId($id);
    public function findAttributeValueById($id);
}
