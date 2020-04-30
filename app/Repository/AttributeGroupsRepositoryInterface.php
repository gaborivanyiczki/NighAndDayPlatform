<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface AttributeGroupsRepositoryInterface
{
    public function getAttributeGroups();
    public function findAttributeGroupById($id);
}
