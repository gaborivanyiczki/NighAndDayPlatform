<?php

namespace App\Http\Requests\Voucher;

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
			'Code' => 'required|unique:vouchers,Code',
			'Discount' => 'required|numeric',
            'Active' => 'required|boolean',
            'VoucherType_ID' => 'required|numeric',
            'StartDate' => 'required',
            'ExpiryDate' => 'required',
        ];
    }
}
