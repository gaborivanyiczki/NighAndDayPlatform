<?php

namespace App\Http\Controllers;

use App\Order;
use App\Repository\Eloquent\OrderRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $orderRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->middleware('auth');
        $this->middleware('role:administrator');

        $this->orderRepo = $orderRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $ordersTotal = Order::count();
        $clientsTotal = User::count();
        $firstDay = date('Y-m-01');
        $currentDate = date("Y-m-d");
        $totalIncome = Order::whereBetween('created_at', [$firstDay, $currentDate])->sum('TotalNet');

        $lastOrders = $this->orderRepo->getLastOrders();

        return view('dashboard.home', [
            'ordersTotal' =>$ordersTotal,
            'clientsTotal' =>$clientsTotal,
            'totalIncome' =>$totalIncome,
            'lastOrders' =>$lastOrders
        ]);
    }
}
