<?php

namespace App\Dtos;
use Spatie\DataTransferObject\DataTransferObject;

class OrderData extends DataTransferObject
{
    //Base informations
    public $User_ID;
    public $UserAddress_ID;
    public $OrderAddress_ID;
    public $ShipCharge;
    public $OrderStatus_ID;
    public $ShipmentStatus_ID;
    public $PaymentType_ID;
    public $Payment_ID;
    public $TotalNet;
    public $Confirmed;
    public $Archived;

    public static function buildDto($data)
    {
        return new self([
            'User_ID' => $data['User_ID'],
            'UserAddress_ID' => $data['UserAddress_ID'],
            'OrderAddress_ID' => $data['OrderAddress_ID'],
            'ShipCharge' => $data['ShipCharge'],
            'OrderStatus_ID' => $data['OrderStatus_ID'],
            'ShipmentStatus_ID' => $data['ShipmentStatus_ID'],
            'PaymentType_ID' => $data['PaymentType_ID'],
            'Payment_ID' => $data['Payment_ID'],
            'TotalNet' => $data['TotalNet'],
            'Confirmed' => $data['Confirmed'],
            'Archived' => $data['Archived']
        ]);
    }
}
