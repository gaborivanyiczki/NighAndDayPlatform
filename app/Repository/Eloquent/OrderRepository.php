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

}
