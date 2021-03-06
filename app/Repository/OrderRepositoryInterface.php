<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface OrderRepositoryInterface
{
    public function getOrders();

    public function getLastOrders();

    public function findOrderById($id);

    public function findOrderWithParticularColumnsById($id);

    public function getUserOrders($userId);
}
