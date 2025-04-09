<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CustomerUpdateRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:customers,email,'.$this->customer->id,
            'phone' => 'required|string|min:10|max:10|unique:customers,phone,'.$this->customer->id,
            'address' => 'required|string|max:500',
            'pincode' => 'required|string|max:10',
            'password' => 'nullable|string|min:8',
          ];
      }else{
        return [];
      }
    }
}
