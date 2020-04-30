<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductMediaFile;
use App\Models\Product;
use App\Http\Requests\ProductMediaFiles\Index;
use App\Http\Requests\ProductMediaFiles\Show;
use App\Http\Requests\ProductMediaFiles\Create;
use App\Http\Requests\ProductMediaFiles\Store;
use App\Http\Requests\ProductMediaFiles\Edit;
use App\Http\Requests\ProductMediaFiles\Update;
use App\Http\Requests\ProductMediaFiles\Destroy;


/**
 * Description of ProductMediaFileController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class ProductMediaFileController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.product_media_files.index', ['records' => ProductMediaFile::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  ProductMediaFile  $productmediafile
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, ProductMediaFile $productmediafile)
    {
        return view('pages.product_media_files.show', [
                'record' =>$productmediafile,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {
		$products = Product::all(['id']);

        return view('pages.product_media_files.create', [
            'model' => new ProductMediaFile,
			"products" => $products,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new ProductMediaFile;
        $model->fill($request->all());

        if ($model->save()) {

            session()->flash('app_message', 'ProductMediaFile saved successfully');
            return redirect()->route('product_media_files.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving ProductMediaFile');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  ProductMediaFile  $productmediafile
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, ProductMediaFile $productmediafile)
    {
		$products = Product::all(['id']);

        return view('pages.product_media_files.edit', [
            'model' => $productmediafile,
			"products" => $products,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  ProductMediaFile  $productmediafile
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,ProductMediaFile $productmediafile)
    {
        $productmediafile->fill($request->all());

        if ($productmediafile->save()) {

            session()->flash('app_message', 'ProductMediaFile successfully updated');
            return redirect()->route('product_media_files.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating ProductMediaFile');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  ProductMediaFile  $productmediafile
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, ProductMediaFile $productmediafile)
    {
        if ($productmediafile->delete()) {
                session()->flash('app_message', 'ProductMediaFile successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting ProductMediaFile');
            }

        return redirect()->back();
    }
}
