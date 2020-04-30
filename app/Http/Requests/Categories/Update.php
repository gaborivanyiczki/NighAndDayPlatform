<?php

namespace App\Http\Requests\Categories;

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
        $id = $this->request->get('CategoryID');

        return [
            'ImageName' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'Name' => 'required|max:255',
			'Slug' => 'required|unique:products,Slug,'.$id,
			'parent_id' => 'nullable|numeric',
			'Active' => 'required|boolean',
			'New' => 'required|boolean',
        ];
    }
}
