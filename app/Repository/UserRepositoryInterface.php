<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
   public function getActiveUsers();
}
