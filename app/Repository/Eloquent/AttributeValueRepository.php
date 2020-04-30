<?php

namespace App\Repository\Eloquent;

use App\AttributeValue;
use App\Repository\AttributeValueRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class AttributeValueRepository extends BaseRepository implements AttributeValueRepositoryInterface
{
    protected $model;

    public function __construct(AttributeValue $attribute)
    {
        $this->model = $attribute;
    }

    public function getAttributeValuesByAttributeId($id)
    {
        return $this->model->where('Attribute_ID', $id)
                            ->select('id','Value')
                            ->get();
    }

    public function findAttributeValueById($id)
    {
        return $this->model->where('id', $id)
                            ->first();
    }
}
