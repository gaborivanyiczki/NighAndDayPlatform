<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface ProductsRepositoryInterface
{
   public function getFavoriteProducts();

   public function getNewProducts();
}
