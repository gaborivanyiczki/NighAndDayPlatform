<?php

namespace App;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use NodeTrait;

    protected $fillable=['Name',
    'Slug',
    'Description',
    'parent_id',
    'Active',
    'New',
    'ImagePath',
    'ImageName',
    'CreatedUser'];

    public function getLftName()
    {
         return '_lft';
    }

    public function getRgtName()
    {
        return '_rgt';
    }

    public function getParentIdName()
    {
       return 'parent_id';
    }

    // Specify parent id attribute mutator
    public function setParentAttribute($value)
    {
        $this->setParentIdAttribute($value);
    }
}
