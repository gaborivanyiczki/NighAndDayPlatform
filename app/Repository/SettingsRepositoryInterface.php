<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface SettingsRepositoryInterface
{
   public function getLayoutSettings();

   public function getContactSettings();
}
