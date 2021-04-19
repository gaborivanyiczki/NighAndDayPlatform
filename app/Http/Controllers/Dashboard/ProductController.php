<?php

namespace App\Http\Controllers\Dashboard;

use App\AttributeGroup;
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
use App\ProductAttribute;
use App\ProductAttributesGroup;
use App\ProductMediaFile;
use App\Repository\Eloquent\BrandsRepository;
use App\Repository\Eloquent\CategoriesRepository;
use App\Repository\Eloquent\ProductsRepository;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


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
    public function show(Request $request)
    {
        return view('pages.products.show');

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
        $product = $this->productRepo->findProductWithAttributesById($id);
        $attributes = $product->attributes;

        $productAttributeGroup = ProductAttribute::where('Product_ID', $id)->select('Product_Attribute_Group_ID')->firstOrNew()->Product_Attribute_Group_ID;

        $product->setAttribute('AttributeGroup_ID', $productAttributeGroup);

        $categories = $this->categoryRepo->getActiveCategories();
        $attributeGroups = ProductAttributesGroup::select('id','Name')->get();
        $brands = $this->brandsRepo->getActiveBrands();

        return view('dashboard.product.edit', [
            'model' => $product,
            'categories' => $categories,
            'brands' => $brands,
            'attributes' => $attributes,
            'attributeGroups' => $attributeGroups
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

        if ($request['DiscountPrice'] != null)
        {
            $product['Discount'] = (($product->Price - $product->DiscountPrice)*100) / $product->Price;
        }

        if ($product->save()) {

            if ($request->hasFile('ImageName')) {
                $currentUser = Auth::user()->email;
                $imagePath = $request->file('ImageName');
                $imageName = date("Y-m-d-H-i-s") . '-' . $imagePath ->getClientOriginalName();
                $imagePath->move(config('global.product_image_move_path'), $imageName);

                $imageModel = ProductMediaFile::where([['Product_ID', $request->ProductID],['Default', 1]])->firstOrNew();

                $imageModel->Product_ID = $request->ProductID;
                $imageModel->Path = config('global.product_path');
                $imageModel->Filename= $imageName;
                $imageModel->Default= 1;
                $imageModel->UploadedBy = $currentUser;

                $imageModel->save();
            }
        }

        return redirect()->back();
    }

    public function updateAttributeGroup(Request $request)
    {
        ProductAttribute::where('Product_ID', $request->ProductID)->update(['Product_Attribute_Group_ID' => $request->Product_Attribute_Group_ID]);

        return redirect()->back();
    }

    public function addAttributes(Request $request)
    {
        $productID = $request->ProductID;
        $attributeList = $request->attribute_id;
        $attributeValueList = $request->attribute_value;
        $attributeGroupId = $request->Product_Attribute_Group_ID;
        $currentUser = Auth::user()->email;

        foreach($attributeList as $key => $attribute)
        {
            $productAttributeModel= new ProductAttribute();
            $productAttributeModel->Attribute_ID = $attribute;
            $productAttributeModel->Attribute_Value_ID = $attributeValueList[$key];
            if($attributeGroupId != null){
                $productAttributeModel->Product_Attribute_Group_ID = $attributeGroupId;
            }
            else{
                $productAttributeGroupModel= new ProductAttributesGroup();
                $productAttributeGroupModel->Name = Product::where('id', $productID)->select('Name')->first()->Name;

                if($productAttributeGroupModel->save())
                {
                    $productAttributeModel->Product_Attribute_Group_ID = $productAttributeGroupModel->id;
                    $attributeGroupId = $productAttributeGroupModel->id;
                }

            }

            $productAttributeModel->Product_ID = $productID;
            $productAttributeModel->CreatedUser = $currentUser;

            $productAttributeModel->save();
        }

        return redirect()->back();
    }

    public function updateProductAttribute(Request $request)
    {
        $productId = $request->ProductID;
        $attributeId = $request->Atribute_ID;
        $previousAttributeValue = $request->Original_Atribute_Value;
        $attributeValueId = $request->Attribute_Value;

        ProductAttribute::where([['Product_ID', $productId], ['Attribute_ID', $attributeId], ['Attribute_Value_ID', $previousAttributeValue]])->update(['Attribute_Value_ID' => $attributeValueId]);

        return redirect()->back();
    }

    public function addProductImage(Request $request)
    {
        if($request->hasFile('file'))
        {
            $imagePath = $request->file('file');
            $imageName = date("Y-m-d-H-i-s") . '-' . $imagePath ->getClientOriginalName();

            // Upload path
            $destinationPath = config('global.product_image_move_path');

            // Create directory if not exists
            if (!file_exists($destinationPath)) {
               mkdir($destinationPath, 0755, true);
            }

            $imagePath->move(config('global.product_image_move_path'), $imageName);

            // Valid extensions
            $validextensions = array("jpeg","jpg","png");
            $extension = $request->file('file')->getClientOriginalExtension();

            // Check extension
            if(in_array(strtolower($extension), $validextensions)){
                $imageModel= new ProductMediaFile;
                $imageModel->Product_ID = $request->ProductID;
                $imageModel->Path = config('global.product_path');
                $imageModel->Filename= $imageName;
                $imageModel->Default= 0;
                $currentUser = Auth::user()->email;
                $imageModel->UploadedBy = $currentUser;
                $imageModel->save();
            }
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

    public function deleteAttribute($id, $productId)
    {
        ProductAttribute::where([['Attribute_ID', $id], ['Product_ID', $productId]])->delete();

        return redirect()->back();
    }

    public function deleteImage($filename)
    {
        unlink(public_path(config('global.product_image_move_path'). '/'.$filename));
        ProductMediaFile::where([['Filename', $filename], ['Default', 0]])->delete();

        return redirect()->back();
    }
}
