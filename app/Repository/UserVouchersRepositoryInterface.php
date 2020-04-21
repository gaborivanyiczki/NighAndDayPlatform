<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface UserVouchersRepositoryInterface
{
   public function getUserVouchers($userId);
}
