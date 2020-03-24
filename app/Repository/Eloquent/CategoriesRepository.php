<?php

namespace App\Repository\Eloquent;

use App\Category;
use App\Repository\CategoriesRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class CategoriesRepository extends BaseRepository implements CategoriesRepositoryInterface
{
    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getNavigationCategories()
    {
        return $this->model->get()->toTree();
    }
}
