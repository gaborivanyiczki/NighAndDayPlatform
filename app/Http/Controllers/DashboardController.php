<?php

namespace App\Http\Controllers;

use App\DataTables\GlobalSettingsDataTable;
use App\GlobalSettings;
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
        $currentDate = date("Y-m-d", time() + 86400);
        $totalIncome = Order::whereBetween('created_at', [$firstDay, $currentDate])->sum('TotalNet');

        $lastOrders = $this->orderRepo->getLastOrders();

        return view('dashboard.home', [
            'ordersTotal' =>$ordersTotal,
            'clientsTotal' =>$clientsTotal,
            'totalIncome' =>$totalIncome,
            'lastOrders' =>$lastOrders
        ]);
    }

    public function settings(GlobalSettingsDataTable $dataTable)
    {
        return $dataTable->render('dashboard.settings.index');
    }

    public function editSettings($id)
    {
        $setting = GlobalSettings::find($id);

        return view('dashboard.settings.edit', [
            'model' => $setting
            ]);
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'Name' => ['required'],
            'Value' => ['required']
        ]);

        $setting = GlobalSettings::find($request->SettingID);

        $setting->fill($request->input());

        $setting->save();

        return redirect()->route('dashboard.settings');

    }
}
