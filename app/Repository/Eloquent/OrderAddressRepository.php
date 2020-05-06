<?php

namespace App\Repository\Eloquent;

use App\OrderAddress;
use App\Repository\OrderAddressRepositoryInterface;
use App\UserAddress;
use Illuminate\Database\Eloquent\Model;


class OrderAddressRepository extends BaseRepository implements OrderAddressRepositoryInterface
{
    protected $model;

    public function __construct(OrderAddress $orderAddress)
    {
        $this->model = $orderAddress;
    }

    public function storeAddress($data)
    {
        $this->model->Address = $data['Address'];
        $this->model->ZipCode = $data['ZipCode'];
        $this->model->Telephone = $data['Telephone'];
        $this->model->Email = $data['Email'];
        $this->model->ContactName = $data['ContactName'];

        $this->model->save();

        return $this->model->id;
    }

    public function storeAddressByUserAddress($id)
    {
        $userAddress = UserAddress::find($id);
        $this->model->Address = $userAddress->Address;
        $this->model->ZipCode = $userAddress->ZipCode;
        $this->model->Telephone = $userAddress->Telephone;
        $this->model->Email = $userAddress->Email;
        $this->model->ContactName = $userAddress->ContactName;

        $this->model->save();

        return $this->model->id;
    }
}
