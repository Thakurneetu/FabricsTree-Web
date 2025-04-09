<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
class CustomerStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request
    }

    public function rules()
    {
        return [
          'name' => 'required|string|max:255',
          //'email' => 'required|string|email|max:255|unique:customers',
          //'phone' => 'required|min:10|max:10|unique:customers',
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
          'password' => 'required|string|min:8',
        ];
    }
}
