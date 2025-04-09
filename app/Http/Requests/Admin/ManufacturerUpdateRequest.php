<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ManufacturerUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request
    }

    public function rules()
    {
      if (!$this->ajax()) {
        return [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:customers,email,'.$this->manufacturer->id,
          'phone' => 'required|string|min:10|max:10|unique:customers,phone,'.$this->manufacturer->id,
          'address' => 'required|string|max:500',
          'pincode' => 'required|string|max:10',
          'password' => 'nullable|string|min:8',
          'firm_name' => 'required|string|max:200',
          'gst_number' => 'required|string|max:200',
          'store_contact' => 'required|string|max:200',
          'store_logo' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,svg',
        ];
      }else{
        return [];
      }
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
