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
            $model->LogoPath = config('global.brand_path');
            $model->LogoFile = $imageName;
        }

        if ($request->hasFile('BannerName')) {
            $imagePath = $request->file('BannerName');
            $imageName = date("Y-m-d-H-i-s") . '-' . $imagePath ->getClientOriginalName();
            $imagePath->move(config('global.brand_image_move_path'), $imageName);
            $model->BannerPath = config('global.brand_path');
            $model->BannerFile = $imageName;
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
            $brand->LogoFile = $imageName;
        }

        if ($request->hasFile('BannerName')) {
            $imagePath = $request->file('BannerName');
            $imageName = date("Y-m-d-H-i-s") . '-' . $imagePath ->getClientOriginalName();
            $imagePath->move(config('global.brand_image_move_path'), $imageName);
            $brand->BannerPath = config('global.brand_path');
            $brand->BannerFile = $imageName;
        }

        if ($brand->save())
        {
            session()->flash('app_message', 'Brand successfully updated');
            return redirect()->route('dashboard.brands');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Brand');
            }
        return redirect()->back();
    }

    public function delete($id)
    {
        Brand::find($id)->update(['Active' => 0]);

        return redirect()->back();
    }

}
