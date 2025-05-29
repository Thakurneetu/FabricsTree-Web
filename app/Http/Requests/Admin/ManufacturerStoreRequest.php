<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;


class ManufacturerStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request
    }

    public function rules()
    {
       $common = 'required|string|max:200';
        return [
          'name' => $common,
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
          'firm_name' => $common,
          'gst_number' => $common,
          'store_contact' => $common,
          'store_logo' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,svg',
        ];
    }

    public function messages()
    {
        return [
            'firm_name.required' => 'The store name field is required.',
            'firm_name.string' => 'Only alphanumeric is allowed.',
            'firm_name.max' => 'The store name length should be less than 200.',
            'store_logo.required' => 'The image is required.',
            'image.image' => 'The file must be an image.',
            'image.max' => 'The image size must be less than 2MB.',
            'image.mimes' => 'The image must be a JPEG, PNG, JPG or SVG file.',
            'image.dimensions' => 'The image dimensions are invalid.'
        ];
    }
}
