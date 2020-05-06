<?php

namespace App\Http\Requests\Orders;

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
            'User_ID' => 'nullable|numeric',
            'UserAddress_ID' => 'nullable|numeric',
            'Address' => 'nullable|max:255',
            'ZipCode' => 'nullable|max:50',
            'Telephone' => 'nullable|max:50',
            'Email' => 'nullable|max:50',
            'ContactName' => 'nullable|max:50',
            'ShipCharge' => 'nullable|numeric',
            'OrderStatus_ID' => 'required|numeric',
            'PaymentType_ID' => 'nullable|numeric',
            'ShipmentStatus_ID' => 'nullable|numeric',
            'TotalValue' => 'required|numeric',
            'Confirmed' => 'required|boolean',
            'Archived' => 'required|boolean'
        ];
    }
}
