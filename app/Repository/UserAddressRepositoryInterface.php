<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface UserAddressRepositoryInterface
{
   public function getDefaultUserAddresses($userId);

   public function getUserAddresses($userId);

   public function getUserAddress($addressTypeId, $userId);

   public function storeUserAddress($userId, $parameters, $default);

   public function updateUserAddress($userId, $parameters);

   public function removeUserAddress($addressTypeId, $userId);

   public function getInvoiceAddresses($userId);

   public function getDeliveryAddresses($userId);
}
