<?php

namespace App\Http\Requests\ProductAttributes;

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
        return [
			'Product_ID' => 'required|exists:products,id|numeric',
			'Attribute_ID' => 'required|exists:attributes,id|numeric',
			'Product_Attribute_Group_ID' => 'required|exists:products_attributes_groups,id|numeric',
			'Value' => 'required|max:255',
			'CreatedUser' => 'nullable|max:255',
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
