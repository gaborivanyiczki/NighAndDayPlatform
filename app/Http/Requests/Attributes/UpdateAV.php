<?php

namespace App\Http\Requests\Attributes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAV extends FormRequest
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
			'Value' => 'required|max:255',
			'Attribute_ID' => 'nullable|numeric',
        ];
    }
}
