<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface CategoriesRepositoryInterface
{
   public function getNavigationCategories();
   public function getCategoryBySlug($slug);
   public function getActiveCategories();
   public function findCategoryById($id);
}
