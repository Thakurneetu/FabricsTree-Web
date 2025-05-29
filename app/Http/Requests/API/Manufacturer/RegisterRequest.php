<?php

namespace App\Http\Requests\API\Manufacturer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
class RegisterRequest extends FormRequest
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
          //'email' => 'required|string|email|max:255|unique:customers',
          //'phone' => 'required|string||unique:customers',
          'email' => [
            'required',
            'string',
            'email',
            'max:255',
            'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ix',
            Rule::unique('customers')->whereNull('deleted_at'),
          ],
          'phone' => [
            'required',
            'string',
            'min:10',
            'max:10',
            Rule::unique('customers')->whereNull('deleted_at'),
          ],
          'address' => 'required|string|max:500',
          'pincode' => 'required|string|max:10',
          'password' => 'required|string|confirmed',
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
