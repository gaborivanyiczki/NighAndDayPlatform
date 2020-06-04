<?php

namespace App\Repository\Eloquent;

use App\AddressType;
use App\Repository\AddressTypeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class AddressTypeRepository extends BaseRepository implements AddressTypeRepositoryInterface
{
    protected $model;

    public function __construct(AddressType $addressType)
    {
        $this->model = $addressType;
    }

    public function getAvailableAddressTypes($userId)
    {
        return $this->model->whereNotIn('id', function($query) use($userId) {
            $query->select('AddresType_ID')
            ->from('user_addresses')
            ->where('User_ID', '=', $userId);
        })->select('address_types.id as AddressTypeCode','address_types.Name as AddressTypeName','address_types.Type as AddressType')->get()->toArray();
    }

    public function isDefaultAddressType($addressType)
    {
        return ($this->model->where('id', $addressType)
                            ->select('Mandatory') === 1);
    }
}
