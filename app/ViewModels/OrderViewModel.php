<?php

namespace App\ViewModels;

use App\OrderAddress;
use App\User;
use App\UserAddress;
use Spatie\ViewModels\ViewModel;

class OrderViewModel extends ViewModel
{
    public $ClientName = 'Client neinregistrat';
    public $ClientEmail = 'Client neinregistrat';
    public $OrderAddress;
    public $OrderPostalCode;
    public $OrderTelephone;
    public $OrderEmail;
    public $OrderContactName;
    public $OrderInvoiceAddress;
    public $OrderInvoicePostalCode;
    public $OrderInvoiceTelephone;
    public $OrderInvoiceEmail;
    public $OrderInvoiceContactName;
    public $OrderItems;
    public $OrderShipCharge;
    public $OrderStatus;
    public $ShipmentStatus;
    public $PaymentType;
    public $OrderTotal;
    public $Confirmed;
    public $Archived;

    public function __construct($order)
    {
        $this->OrderItems = $order->orderItems;
        $this->setOrderDetails($order);
    }

    public function setOrderDetails($order)
    {
        $user = null;
        if($order->User_ID != null)
        {
            $user = User::find($order->User_ID);
            $this->ClientName = $user->firstname . ' ' . $user->lastname;
            $this->ClientEmail = $user->email;
        }

        $orderAddress = null;
        $orderInvoiceAddress = null;

        if($order->OrderAddress_ID != null)
        {
            $address = OrderAddress::find($order->OrderAddress_ID);
            $orderAddress = $address;
            $orderInvoiceAddress = $address;
        }
        else
        {
            $orderAddress = UserAddress::find($order->DeliveryAddress_ID);
            $orderInvoiceAddress = UserAddress::find($order->InvoiceAddress_ID);
        }

        //set delivery address
        $this->OrderAddress = $orderAddress['Address'];
        $this->OrderPostalCode = $orderAddress['ZipCode'];
        $this->OrderTelephone = $orderAddress['Telephone'];
        $this->OrderEmail = $orderAddress['Email'];
        $this->OrderContactName = $orderAddress['ContactName'];
        //set invoice address
        $this->OrderInvoiceAddress = $orderInvoiceAddress['Address'];
        $this->OrderInvoicePostalCode = $orderInvoiceAddress['ZipCode'];
        $this->OrderInvoiceTelephone = $orderInvoiceAddress['Telephone'];
        $this->OrderInvoiceEmail = $orderInvoiceAddress['Email'];
        $this->OrderInvoiceContactName = $orderInvoiceAddress['ContactName'];
        //set order details
        $this->OrderStatus = $order->OrderStatus;
        $this->ShipmentStatus = $order->ShipmentStatus;
        $this->PaymentType = $order->PaymentType;
        $this->OrderShipCharge = $order->ShipCharge;
        $this->OrderTotal = $order->TotalNet;
        $this->Confirmed = $order->Confirmed;
        $this->Archived = $order->Archived;
    }
}
