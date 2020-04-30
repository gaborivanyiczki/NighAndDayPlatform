<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface AttributeRepositoryInterface
{
    public function getActiveAttributes();
    public function findAttributeById($id);
}
