<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface BrandsRepositoryInterface
{
   public function getNavigationBrands();

   public function getWidgetBrands();

   public function getBrandBySlug($slug);

   public function getActiveBrands();

   public function findBrandById($id);
}
