<?php

namespace App\Http\Requests\Attributes;

use Illuminate\Foundation\Http\FormRequest;

class StoreAG extends FormRequest
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
			'Name' => 'required|max:255',
        ];
    }
}
