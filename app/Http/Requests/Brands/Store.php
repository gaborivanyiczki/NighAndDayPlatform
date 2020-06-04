<?php

namespace App\Http\Requests\Brands;

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
            'ImageName' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'BannerName' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'Name' => 'required|max:255',
            'Slug' => 'required|unique:products,Slug|max:255',
            'Description' => 'nullable|string',
			'Active' => 'required|boolean',
            'New' => 'required|boolean',
            'WidgetShow' => 'required|boolean',
        ];
    }
}
