<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface OrderAddressRepositoryInterface
{
    public function storeAddress($data);

    public function storeAddressByUserAddress($id);
}
