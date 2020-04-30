<?php

namespace App\Http\Requests\ProductMediaFiles;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest 
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
			'Path' => 'required|max:255',
			'Filename' => 'required|max:255',
			'UploadedBy' => 'required|max:255',
			'Default' => 'required',
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
