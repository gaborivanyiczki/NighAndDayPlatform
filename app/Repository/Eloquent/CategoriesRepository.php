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

    public function getCategoryBySlug($slug)
    {
        return $this->model->where('Slug', $slug)
                            ->select('Name','Description','Slug','ImagePath','ImageName')
                            ->first();
    }

    public function getActiveCategories()
    {
        return $this->model->where('Active', 1)
                            ->select('id', 'Name')
                            ->get();
    }

    public function findCategoryById($id)
    {
        return $this->model->where('id', $id)
                            ->first();
    }
}
