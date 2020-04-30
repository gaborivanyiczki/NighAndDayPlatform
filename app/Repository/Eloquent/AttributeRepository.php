<?php

namespace App\Repository\Eloquent;

use App\Attribute;
use App\Repository\AttributeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class AttributeRepository extends BaseRepository implements AttributeRepositoryInterface
{
    protected $model;

    public function __construct(Attribute $attribute)
    {
        $this->model = $attribute;
    }

    public function getActiveAttributes()
    {
        return $this->model->select('id','Name')
                            ->get();
    }

    public function findAttributeById($id)
    {
        return $this->model->where('id', $id)
                            ->first();
    }
}
