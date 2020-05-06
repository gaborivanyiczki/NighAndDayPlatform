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

   public function getProductsByBrand($slug);

   public function getCountProductsByCategory($slug);

   public function getCountProductsByBrand($slug);

   public function getProductsByFilter($categorySlug, $skip, $take, array $sort);

   public function getProductsByBrandFilter($brandSlug, $skip, $take, array $sort);

   public function findParticularProductBySlug($slug);

   public function findProductById($id);

   public function getProductIdBySlug($slug);

   public function getProductNameById($id);

   public function getActiveProductsForSelect();

   public function getProductPrice($id);

   public function findProductWithAttributesById($id);
}
