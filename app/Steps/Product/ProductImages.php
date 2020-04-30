<?php

namespace App\Steps\Product;

use Illuminate\Http\Request;
use Ycs77\LaravelWizard\Step;
use App\ProductMediaFile;
use Illuminate\Support\Facades\Auth;

class ProductImages extends Step
{
    /**
     * The step slug.
     *
     * @var string
     */
    protected $slug = 'product_images';

    /**
     * The step show label text.
     *
     * @var string
     */
    protected $label = 'Media';

    /**
     * The step form view path.
     *
     * @var string
     */
    protected $view = 'dashboard.steps.product.product_images';

    /**
     * Set the step model instance or the relationships instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\Relation|null
     */
    public function model(Request $request)
    {
        //
    }

    /**
     * Save this step form data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array|null  $data
     * @param  \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\Relation|null  $model
     * @return void
     */
    public function saveData(Request $request, $data = null, $model = null)
    {
        if ($request->hasFile('filename'))
        {
            $currentUser = Auth::user()->email;
            $productID = $request->session()->pull('AddedProduct_'.Auth::id());
            $files=$request->file('filename');
            foreach($files as $file)
            {
                $imageModel = new ProductMediaFile();
                $imageName = date("Y-m-d-H-i-s") . '-' . $file ->getClientOriginalName();
                $file->move(config('global.product_image_move_path'), $imageName);
                $imageModel->Product_ID = $productID;
                $imageModel->Path = config('global.product_path');
                $imageModel->Filename= $imageName;
                $imageModel->Default= 0;
                $imageModel->UploadedBy = $currentUser;

                $imageModel->save();
            }
        }
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
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
