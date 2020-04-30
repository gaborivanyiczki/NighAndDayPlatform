<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface VoucherRepositoryInterface
{
   public function getVouchers();

   public function findVoucherById($id);
}
