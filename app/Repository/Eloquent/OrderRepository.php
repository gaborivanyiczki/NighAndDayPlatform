<?php

namespace App\Repository\Eloquent;

use App\Order;
use App\Repository\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    protected $model;

    public function __construct(Order $order)
    {
        $this->model = $order;
    }

    public function getOrders()
    {
        return $this->model->where('Archived', 0)
                            ->get();
    }

    public function getLastOrders()
    {
        return $this->model->join('order_statuses', 'order_statuses.id', '=', 'OrderStatus_ID')
                            ->join('payment_types', 'payment_types.id', '=', 'PaymentType_ID')
                            ->select('orders.id', 'orders.TotalNet', 'order_statuses.Name as OrderStatus', 'payment_types.Name as PaymentType')
                            ->orderBy('orders.created_at', 'desc')
                            ->take(5)
                            ->get();
    }

    public function findOrderById($id)
    {
        return $this->model->with(['orderItems' => function($query) { $query->join('products', 'products.id', '=', 'Product_ID')
                                                                            ->select('products.Name','order_items.Quantity','Order_ID'); }])
                            ->where('orders.id', $id)
                            ->first();
    }

    public function findOrderWithParticularColumnsById($id)
    {
        return $this->model->with(['orderItems' => function($query) { $query->join('products', 'products.id', '=', 'Product_ID')
                                                                            ->select('products.Name','order_items.Quantity','Order_ID','order_items.ProductPrice','Total'); }])
                            ->leftjoin('order_statuses', 'order_statuses.id' ,'=', 'orders.OrderStatus_ID')
                            ->leftjoin('shipment_statuses', 'shipment_statuses.id' ,'=', 'orders.ShipmentStatus_ID')
                            ->leftjoin('payment_types', 'payment_types.id' ,'=', 'orders.PaymentType_ID')
                            ->where('orders.id', $id)
                            ->select('orders.id',
                                    'orders.User_ID',
                                    'orders.OrderAddress_ID',
                                    'orders.ShipCharge',
                                    'orders.TotalNet',
                                    'orders.Confirmed',
                                    'orders.Archived',
                                    'order_statuses.Name as OrderStatus',
                                    'shipment_statuses.Name as ShipmentStatus',
                                    'payment_types.Name as PaymentType')
                            ->first();
    }
}
