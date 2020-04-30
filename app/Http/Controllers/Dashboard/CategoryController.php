<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\DataTables\CategoryDataTable;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Categories\Store;
use App\Http\Requests\Categories\Update;
use App\Http\Requests\Categories\Destroy;
use App\Repository\Eloquent\CategoriesRepository;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->middleware('auth');
        $this->middleware('role:administrator');
        $this->categoryRepo = $categoriesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('dashboard.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->categoryRepo->findCategoryById($id);
        return view('dashboard.category.show', [
                'category' =>$category,
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
        return view('dashboard.category.create', [ 'categories' => $categories ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Category();
        $model->fill($request->input());

        $currentUser = Auth::user()->email;
        $model->CreatedUser = $currentUser;

        if ($request->hasFile('ImageName')) {
            $imagePath = $request->file('ImageName');
            $imageName = date("Y-m-d-H-i-s") . '-' . $imagePath ->getClientOriginalName();
            $imagePath->move(config('global.category_image_move_path'), $imageName);
            $model->ImagePath = config('global.category_path');
            $model->ImageName= $imageName;
        }

        $model->save();

        return redirect()->route('dashboard.categories');
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
        $category = $this->categoryRepo->findCategoryById($id);
        $categories = $this->categoryRepo->getActiveCategories();

        return view('dashboard.category.edit', [
            'model' => $category,
            'categories' => $categories
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
        $category = Category::find($request->CategoryID);
        $category->fill($request->input());

        if ($request->hasFile('ImageName')) {
            $imagePath = $request->file('ImageName');
            $imageName = date("Y-m-d-H-i-s") . '-' . $imagePath ->getClientOriginalName();
            $imagePath->move(config('global.category_image_move_path'), $imageName);
            $category->ImagePath = config('global.category_path');
            $category->ImageName= $imageName;
        }

        if ($category->save()) {

            session()->flash('app_message', 'Category successfully updated');
            return redirect()->route('dashboard.categories');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Category');
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
        $category = Category::find($id);

        if ($category->delete()) {
                session()->flash('app_message', 'Category successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Category');
            }

        return redirect()->back();
    }
}
