<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderStatus;
use App\Repository\Eloquent\ProductsRepository;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTables;


class OrderController extends Controller
{
    protected $brandsRepo;
    protected $usersRepo;
    protected $productsRepo;
    protected $htmlBuilder;

    public function __construct(Builder $htmlBuilder, UserRepository $userRepository, ProductsRepository $productsRepository)
    {
        $this->middleware('auth');
        $this->middleware('role:administrator');
        $this->htmlBuilder = $htmlBuilder;
        $this->usersRepo = $userRepository;
        $this->productsRepo = $productsRepository;
    }

    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('dashboard.order.index');
    }

    public function getProducts()
    {
        $products = $this->productsRepo->getActiveProductsForSelect();

        return response()->json($products);
    }

    public function create()
    {
        $users = $this->usersRepo->getActiveUsers();
        $statuses = OrderStatus::select('id','Name')->get();

        return view('dashboard.order.create', [
            'users' => $users,
            'statuses' => $statuses
        ]);
    }

   /* public function index(Request $request)
    {
        if ($request->ajax())
        {
            return Datatables::of(Order::select(['id', 'User_ID', 'OrderStatus_ID', 'TotalNet', 'created_at']))->make(true);
        }


        $html = $this->htmlBuilder
        ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'ID Comanda'])
        ->addColumn(['data' => 'User_ID', 'name' => 'User_ID', 'title' => 'Nume utilizator'])
        ->addColumn(['data' => 'OrderStatus_ID', 'name' => 'OrderStatus_ID', 'title' => 'Status Comanda'])
        ->addColumn(['data' => 'TotalNet', 'name' => 'TotalNet', 'title' => 'Total comanda'])
        ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Data comenzii']);

        return view('dashboard.order.index', compact('html'));
    }*/

    /*public function show($id)
    {
        $brand = $this->brandsRepo->findBrandById($id);
        return view('dashboard.brand.show', [
                'brand' =>$brand,
        ]);
    }

    public function create()
    {
        return view('dashboard.brand.create');
    }

    public function store(Store $request)
    {
        $model=new Brand();
        $model->fill($request->input());

        if ($request->hasFile('ImageName')) {
            $imagePath = $request->file('ImageName');
            $imageName = date("Y-m-d-H-i-s") . '-' . $imagePath ->getClientOriginalName();
            $imagePath->move(config('global.brand_image_move_path'), $imageName);
            $model->LogoFile = config('global.brand_path');
            $model->ImageName= $imageName;
        }

        $model->save();

        return redirect()->route('dashboard.brands');
    }

    public function edit($id)
    {
        $brand = $this->brandsRepo->findBrandById($id);

        return view('dashboard.brand.edit', [
            'model' => $brand
            ]);
    }

    public function update(Update $request)
    {
        $brand = Brand::find($request->BrandID);
        $brand->fill($request->input());

        if ($request->hasFile('ImageName')) {
            $imagePath = $request->file('ImageName');
            $imageName = date("Y-m-d-H-i-s") . '-' . $imagePath ->getClientOriginalName();
            $imagePath->move(config('global.brand_image_move_path'), $imageName);
            $brand->LogoPath = config('global.brand_path');
            $brand->Logofile= $imageName;
        }

        if ($brand->save()) {

            session()->flash('app_message', 'Brand successfully updated');
            return redirect()->route('dashboard.categories');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Brand');
            }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);

        if ($brand->delete()) {
                session()->flash('app_message', 'Brand successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Brand');
            }

        return redirect()->back();
    }*/

}
