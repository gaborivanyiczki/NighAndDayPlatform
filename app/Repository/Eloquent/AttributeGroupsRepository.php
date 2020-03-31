<?php

namespace App\Repository\Eloquent;

use App\AttributeGroup;
use App\Repository\AttributeGroupsRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class AttributeGroupsRepository extends BaseRepository implements AttributeGroupsRepositoryInterface
{
    protected $model;

    public function __construct(AttributeGroup $attributeGroup)
    {
        $this->model = $attributeGroup;
    }

    public function getAttributeGroups()
    {
        return $this->model->select('id','Name')
                            ->get();
    }
}
