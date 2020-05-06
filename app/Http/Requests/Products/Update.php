<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->request->get('ProductID');

        return [
            'ImageName' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'Name' => 'required|max:255',
			'Slug' => 'required|unique:products,Slug,'.$id,
			'ProductCode' => 'nullable|unique:products,ProductCode,'.$id,
			'Warranty' => 'nullable|numeric',
			'Return' => 'nullable|numeric',
			'Delivery' => 'nullable|max:50',
			'Description' => 'nullable|string',
			'Price' => 'required|numeric',
			'DiscountPrice' => 'nullable|numeric',
			'Quantity' => 'required|numeric',
			'Category_ID' => 'nullable|numeric',
			'Brand_ID' => 'nullable|numeric',
			'Active' => 'required|boolean',
			'Favorite' => 'required|boolean',
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [

        ];
    }

}
