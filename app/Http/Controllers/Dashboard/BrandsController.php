<?php

namespace App\Http\Controllers\Dashboard;

use App\Brand;
use App\DataTables\BrandDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Eloquent\BrandsRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Brands\Store;
use App\Http\Requests\Brands\Update;

class BrandsController extends Controller
{
    protected $brandsRepo;

    public function __construct(BrandsRepository $brandsRepository)
    {
        $this->middleware('auth');
        $this->middleware('role:administrator');

        $this->brandsRepo = $brandsRepository;
    }

    public function index(BrandDataTable $dataTable)
    {
        return $dataTable->render('dashboard.brand.index');
    }

    public function show($id)
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
    }

}
