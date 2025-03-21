<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ManufacturerStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request
    }

    public function rules()
    {
        return [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:customers',
          'phone' => 'required|max:10|unique:customers',
          'address' => 'required|string|max:500',
          'pincode' => 'required|string|max:10',
          'password' => 'required|string|min:8',
          'firm_name' => 'required|string|max:200',
          'gst_number' => 'required|string|max:200',
          'store_contact' => 'required|string|max:200',
          'store_logo' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,svg',
        ];
    }

    public function messages()
    {
        return [
            'store_logo.required' => 'The image is required.',
            'image.image' => 'The file must be an image.',
            'image.max' => 'The image size must be less than 2MB.',
            'image.mimes' => 'The image must be a JPEG, PNG, JPG or SVG file.',
            'image.dimensions' => 'The image dimensions are invalid.'
        ];
    }
}
