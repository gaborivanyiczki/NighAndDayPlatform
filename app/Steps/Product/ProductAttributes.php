<?php

namespace App\Steps\Product;

use Illuminate\Http\Request;
use Ycs77\LaravelWizard\Step;
use App\Product;
use App\ProductAttribute;
use App\ProductAttributesGroup;
use App\ProductMediaFile;
use Illuminate\Support\Facades\Auth;

class ProductAttributes extends Step
{
    /**
     * The step slug.
     *
     * @var string
     */
    protected $slug = 'product_attributes';

    /**
     * The step show label text.
     *
     * @var string
     */
    protected $label = 'Atribute';

    /**
     * The step form view path.
     *
     * @var string
     */
    protected $view = 'dashboard.steps.product.product_attributes';

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
        $productID = $request->session()->pull('AddedProduct_'.Auth::id());
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

        $request->session()->put('AddedProduct_'.Auth::id(), $productID);
    }

    public function getProductGroups()
    {
        return ProductAttributesGroup::select('id', 'Name')
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
        return [];
    }
}
