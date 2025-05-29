<?php

namespace App\Http\Requests\API\Manufacturer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request
    }

    public function rules()
    {
      $common = 'required|string|max:255';
        return [
          'name' => $common,
          'email' => 'required|string|email|max:255|unique:manufacturers,email,'.$this->user()->id,
          'phone' => 'required|string|unique:manufacturers,phone,'.$this->user()->id,
          'address' => 'required|string|max:500',
          'pincode' => 'required|max:10',
          'password' => 'nullable|string|confirmed',
          'firm_name' => $common,
          'gst_number' => $common,
          'store_contact' => $common,
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => $validator->errors()->first(),
            'errors' => $validator->errors(),
        ], 500));
    }
}
