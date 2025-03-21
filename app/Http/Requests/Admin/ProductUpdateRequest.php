<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request
    }

    public function rules()
    {
        return [
          'title' => 'required|string|max:255',
          'subtitle' => 'nullable|string|max:255',
          'description' => 'nullable',
          'key_features' => 'nullable',
          'disclaimer' => 'nullable',
          'wrap' => 'nullable|string|max:255',
          'weft' => 'nullable|string|max:255',
          'width' => 'nullable|string|max:255',
          'count' => 'nullable|string|max:255',
          'reed' => 'nullable|string|max:255',
          'pick' => 'nullable|string|max:255',
          'category_id' => 'required',
          'requirement_id' => 'required',
          'subcategory_id' => 'required',
          'images' => 'required|array',
          'images.*' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'images.required' => 'Please upload at least one image.',
            'category_id.required' => 'Please select category type.',
            'subcategory_id.required' => 'Please select subcategory type.',
            'requirement_id.required' => 'Please select requirement type.',
            'images.*.required' => 'An image is required.',
            'images.*.image' => 'The file must be an image.',
            'images.*.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'images.*.max' => 'The image may not be greater than 2048 kilobytes.',
        ];
    }
}
