<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAddress extends FormRequest
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
            'addressType' => 'required|numeric',
            'address' => 'required|string|max:255',
            'zipcode' => 'required|string|max:50',
            'telephone' => 'required|string|max:50',
            'contactname' => 'required|string|max:50'
        ];
    }

    public function messages()
    {
        return [
            'addressType.required' => 'Va rugam selectati tipul adresei',
            'address.required'  => 'Va rugam introduceti adresa',
            'zipcode.required'  => 'Va rugam introduceti codul postal',
            'telephone.required'  => 'Va rugam introduceti numarul de telefon',
            'contactname.required'  => 'Va rugam introduceti numele de contact',
        ];
    }

    public function filters()
    {
        return [];
    }
}
