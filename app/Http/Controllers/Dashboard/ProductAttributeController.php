<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\ProductsAttributesGroup;
use App\Http\Requests\ProductAttributes\Index;
use App\Http\Requests\ProductAttributes\Show;
use App\Http\Requests\ProductAttributes\Create;
use App\Http\Requests\ProductAttributes\Store;
use App\Http\Requests\ProductAttributes\Edit;
use App\Http\Requests\ProductAttributes\Update;
use App\Http\Requests\ProductAttributes\Destroy;


/**
 * Description of ProductAttributeController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class ProductAttributeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.product_attributes.index', ['records' => ProductAttribute::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  ProductAttribute  $productattribute
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, ProductAttribute $productattribute)
    {
        return view('pages.product_attributes.show', [
                'record' =>$productattribute,
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
		$attributes = Attribute::all(['id']);
		$products_attributes_groups = ProductsAttributesGroup::all(['id']);

        return view('pages.product_attributes.create', [
            'model' => new ProductAttribute,
			"products" => $products,
			"attributes" => $attributes,
			"products_attributes_groups" => $products_attributes_groups,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new ProductAttribute;
        $model->fill($request->all());

        if ($model->save()) {

            session()->flash('app_message', 'ProductAttribute saved successfully');
            return redirect()->route('product_attributes.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving ProductAttribute');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  ProductAttribute  $productattribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, ProductAttribute $productattribute)
    {
		$products = Product::all(['id']);
		$attributes = Attribute::all(['id']);
		$products_attributes_groups = ProductsAttributesGroup::all(['id']);

        return view('pages.product_attributes.edit', [
            'model' => $productattribute,
			"products" => $products,
			"attributes" => $attributes,
			"products_attributes_groups" => $products_attributes_groups,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  ProductAttribute  $productattribute
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,ProductAttribute $productattribute)
    {
        $productattribute->fill($request->all());

        if ($productattribute->save()) {

            session()->flash('app_message', 'ProductAttribute successfully updated');
            return redirect()->route('product_attributes.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating ProductAttribute');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  ProductAttribute  $productattribute
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, ProductAttribute $productattribute)
    {
        if ($productattribute->delete()) {
                session()->flash('app_message', 'ProductAttribute successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting ProductAttribute');
            }

        return redirect()->back();
    }
}
