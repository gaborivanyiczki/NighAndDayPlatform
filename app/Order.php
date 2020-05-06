<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

class Order extends Model
{
    use EloquentJoin;

    protected $table = 'orders';

    protected $fillable = [
        'User_ID',
        'UserAddress_ID',
        'OrderAddress_ID',
        'ShipCharge',
        'OrderStatus_ID',
        'ShipmentStatus_ID',
        'PaymentType_ID',
        'Payment_ID',
        'TotalNet',
        'Confirmed',
        'Archived',
        'AuditUser'
    ];

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem', 'Order_ID');
    }
}
