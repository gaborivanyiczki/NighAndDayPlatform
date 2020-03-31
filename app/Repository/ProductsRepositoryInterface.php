<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface ProductsRepositoryInterface
{
   public function getFavoriteProducts();

   public function getNewProducts();

   public function getSimilarProducts($slug, $category);

   public function getOtherProducts($slug);

   public function getProductsByCategory($slug);
}
