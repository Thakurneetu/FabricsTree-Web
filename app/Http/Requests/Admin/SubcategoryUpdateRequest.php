<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SubcategoryUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request
    }

    public function rules()
    {
        return [
          'category_id' => 'required',
          'name' => 'required|max:255|unique:subcategories,name,'.$this->subcategory->id
        ];
    }

    public function messages()
    {
        return [
          'category_id.required' => 'Please select a category',
        ];
    }
}
