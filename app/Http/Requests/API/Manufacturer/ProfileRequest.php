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
        return [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:manufacturers,email,'.$this->user()->id,
          'phone' => 'required|string|unique:manufacturers,phone,'.$this->user()->id,
          'address' => 'required|string|max:500',
          'pincode' => 'required|max:10',
          'password' => 'nullable|string|confirmed',
          'store_name' => 'required|string|max:255',
          'gst' => 'required|string|max:255',
          'store_contact' => 'required|string|max:255',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ], 500));
    }
}
