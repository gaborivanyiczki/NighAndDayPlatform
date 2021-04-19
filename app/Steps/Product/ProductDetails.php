<?php

namespace App\Steps\Product;

use App\Brand;
use App\Category;
use App\Http\Requests\Products\Store;
use Illuminate\Http\Request;
use Ycs77\LaravelWizard\Step;
use App\Product;
use App\ProductMediaFile;
use Illuminate\Support\Facades\Auth;
use App\Repository\Eloquent\BrandsRepository;
use App\Repository\Eloquent\CategoriesRepository;

class ProductDetails extends Step
{
    /**
     * The step slug.
     *
     * @var string
     */
    protected $slug = 'product_details';

    /**
     * The step show label text.
     *
     * @var string
     */
    protected $label = 'Informatii';

    /**
     * The step form view path.
     *
     * @var string
     */
    protected $view = 'dashboard.steps.product.product_details';

    /**
     * Set the step model instance or the relationships instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\Relation|null
     */

    public function model(Request $request)
    {

    }

    /**
     * Save this step form data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array|null  $data
     * @param  \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\Relation|null  $model
     * @return void
     */
    public function saveData(Request $request, $data = NULL, $model = NULL)
    {
        $model=new Product;
        $imageModel= new ProductMediaFile;
        $model->fill($request->input());

        $currentUser = Auth::user()->email;
        $model->CreatedUser = $currentUser;

        if ($request['DiscountPrice'] != null)
        {
            $model['Discount'] = (($model->Price - $model->DiscountPrice)*100) / $model->Price;
        }

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

                if($imageModel->save())
                {
                    $request->session()->put('AddedProduct_'.Auth::id(), $model->id);
                }
            }
        }
    }

    public function getCategories()
    {
        return Category::where('Active', 1)
                        ->select('id', 'Name')
                        ->get();
    }

    public function getBrands()
    {
        return Brand::where('Active', 1)
                    ->select('id', 'Name')
                    ->get();
    }

    /**
     * Validation rules.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function rules(Request $request)
    {
        return [
			'Name' => 'required|max:255',
            'Slug' => 'required|unique:products,Slug|max:255',
            'ImageName' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'ProductCode' => 'nullable|unique:products,ProductCode|max:50',
			'Warranty' => 'nullable|numeric',
			'Return' => 'nullable|numeric',
			'Delivery' => 'nullable|max:50',
			'Description' => 'nullable|string',
			'Price' => 'required|numeric',
			'DiscountPrice' => 'nullable|numeric',
			'Quantity' => 'required|numeric',
			'Category_ID' => 'nullable|numeric',
			'Brand_ID' => 'nullable|numeric',
        ];
    }
}
