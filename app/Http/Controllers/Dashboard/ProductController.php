<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Http\Requests\Products\Index;
use App\Http\Requests\Products\Show;
use App\Http\Requests\Products\Create;
use App\Http\Requests\Products\Store;
use App\Http\Requests\Products\Edit;
use App\Http\Requests\Products\Update;
use App\Http\Requests\Products\Destroy;
use App\DataTables\ProductDataTable;
use App\ProductMediaFile;
use App\Repository\Eloquent\BrandsRepository;
use App\Repository\Eloquent\CategoriesRepository;
use App\Repository\Eloquent\ProductsRepository;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    protected $productRepo;
    protected $categoryRepo;
    protected $brandsRepo;

    public function __construct(ProductsRepository $productsRepository, CategoriesRepository $categoriesRepository, BrandsRepository $brandsRepository)
    {
        $this->middleware('auth');
        $this->middleware('role:administrator');

        $this->productRepo = $productsRepository;
        $this->categoryRepo = $categoriesRepository;
        $this->brandsRepo = $brandsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('dashboard.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Product $product)
    {
        return view('pages.products.show', [
                'record' =>$product,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepo->getActiveCategories();
        $brands = $this->brandsRepo->getActiveBrands();
        return view('dashboard.product.create', [ 'categories' => $categories, 'brands' => $brands ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Product;
        $imageModel= new ProductMediaFile;
        $model->fill($request->input());

        $currentUser = Auth::user()->email;
        $model->CreatedUser = $currentUser;

        if ($model->save()) {
            if ($request->hasFile('ImageName')) {
                $imagePath = $request->file('ImageName');
                $imageName = date("Y-m-d-H-i-s") . '-' . $imagePath ->getClientOriginalName();
                $imagePath->move(config('global.product_image_move_path'), $imageName);
                $imageModel->Product_ID = $model->id;
                $imageModel->Path = config('global.product_path');
                $imageModel->Filename= $imageName;
                $imageModel->Default= 1;
                $imageModel->UploadedBy = $currentUser;

                $imageModel->save();
            }
        }

        return redirect()->route('dashboard.products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepo->findProductById($id);
        $categories = $this->categoryRepo->getActiveCategories();
        $brands = $this->brandsRepo->getActiveBrands();

        return view('dashboard.product.edit', [
            'model' => $product,
            'categories' => $categories,
            'brands' => $brands
            ]);
    }

    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request)
    {
        $product = Product::find($request->ProductID);
        $product->fill($request->input());

        if ($product->save()) {

            session()->flash('app_message', 'Product successfully updated');
            return redirect()->route('dashboard.products');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Product');
            }
        return redirect()->back();
    }

    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product->delete()) {
                session()->flash('app_message', 'Product successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Product');
            }

        return redirect()->back();
    }
}
