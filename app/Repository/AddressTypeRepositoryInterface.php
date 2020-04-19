<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface AddressTypeRepositoryInterface
{
    public function getAvailableAddressTypes($userId);

    public function isDefaultAddressType($addressType);
}
