<?php

namespace App\Repository\Eloquent;

use App\UserAddress;
use App\Repository\UserAddressRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class UserAddressRepository extends BaseRepository implements UserAddressRepositoryInterface
{
    protected $model;

    public function __construct(UserAddress $userAddress)
    {
        $this->model = $userAddress;
    }

    public function getDefaultUserAddresses($userId)
    {
        return $this->model->where([['user_addresses.Default', 1], ['user_addresses.User_ID', $userId]])
                    ->join('address_types', 'address_types.id', '=', 'AddresType_ID')
                    ->select('address_types.Name as AddressTypeName','Address','ZipCode','Telephone','ContactName')
                    ->get()->toArray();
    }

    public function getUserAddresses($userId)
    {
        return $this->model->where('user_addresses.User_ID', $userId)
                    ->join('address_types', 'address_types.id', '=', 'AddresType_ID')
                    ->select('address_types.Name as AddressTypeName','Address','ZipCode','Telephone','ContactName', 'AddresType_ID as AddressType')
                    ->get()->toArray();
    }

    public function getInvoiceAddresses($userId)
    {
        return $this->model->where([['user_addresses.User_ID', $userId],['address_types.Type', 1]])
                    ->join('address_types', 'address_types.id', '=', 'AddresType_ID')
                    ->select('address_types.Name as AddressTypeName','Address','ZipCode','Telephone','ContactName', 'AddresType_ID as AddressType','user_addresses.id as AddressID')
                    ->get()->toArray();
    }

    public function getDeliveryAddresses($userId)
    {
        return $this->model->where([['user_addresses.User_ID', $userId],['address_types.Type', 2]])
                    ->join('address_types', 'address_types.id', '=', 'AddresType_ID')
                    ->select('address_types.Name as AddressTypeName','Address','ZipCode','Telephone','ContactName', 'AddresType_ID as AddressType','user_addresses.id as AddressID')
                    ->get()->toArray();
    }

    public function getUserAddress($addressTypeId, $userId)
    {
        return $this->model->where([['User_ID', $userId], ['AddresType_ID', $addressTypeId]])
                            ->select('Address','ZipCode','Telephone','ContactName')
                            ->first();
    }

    public function storeUserAddress($userId, $parameters, $default)
    {
        $this->model->create(['User_ID' => $userId,
                            'AddresType_ID' => $parameters['addressType'],
                            'Address' => $parameters['address'],
                            'Zipcode' => $parameters['zipcode'],
                            'Telephone' => $parameters['telephone'],
                            'Default' => $default,
                            'ContactName' => $parameters['contactname']]);
    }

    public function updateUserAddress($userId, $parameters)
    {
          $this->model->where('User_ID', $userId)
                      ->where('AddresType_ID', $parameters['addressType'])
                      ->update(['Address' => $parameters['address'],
                                'Zipcode' => $parameters['zipcode'],
                                'Telephone' => $parameters['telephone'],
                                'ContactName' => $parameters['contactname']]);
    }

    public function removeUserAddress($addressTypeId, $userId)
    {
          $this->model->where('User_ID', $userId)
                      ->where('AddresType_ID', $addressTypeId)
                      ->delete();
    }
}
