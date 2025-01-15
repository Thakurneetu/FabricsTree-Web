<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;
        return view('user.index',$data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
          'name' => 'required|min:2|max:50|string|max:255',
          //'email' => 'required|email|string|max:255|regex:/^([a-z0-9+-]+)(.[a-z0-9+-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/ix|unique:customers',
          
          //'email' => 'required|email|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ix|unique:customers',
          //'phone' => 'required|min:10|max:10|unique:customers',
           'email' => 'required|email|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ix',
          'phone' => 'required|min:10|max:10',
          'address' => 'required',
        ],
        [
            'email.required' =>'The email field is required.',
            //'email.unique' => 'The email has already exist.',
            'phone.required' => 'The mobile no. field is required.',
            //'phone.unique' => 'The mobile no. has already exist.',
            'phone.min' => 'The mobile no. must be at least 8 digits.'
        ]);
    }

    public function update_profile(Request $request){
        try {
            $this->validator($request->all())->validate();

            $customer = Customer::where('email', $request->email)->first();
            if($customer){
                $user = Customer::where('email', $request->email)->update(['name' => $request->name,'address' => $request->address]);

                return response()->json([
                    'status' => true,
                    'message' => 'Your profile has been successfully updated.',
                    'data' => $customer,
                ], 200);

            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'No record Found!',
                    'errors' => 'No record Found!',
                ], 400);
            }
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $this->transformErrors($e),
                'errors' => $e->getMessage(),
            ], 400);
        }
    }
    

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function change_validator(array $data)
    {
        return Validator::make($data, [
            'new_password' => 'required|min:8',
            'confirm_password'=>'required|min:8|same:new_password',
        ],[
            'new_password.required' => 'The password field is required.',
            'new_password.min' => 'The password must be at least 8 characters.',
            'confirm_password.required' => 'The confirm password field is required.',
            'confirm_password.same' => 'The confirm password does not match.',
            'confirm_password.min' => 'The confirm password must be at least 8 characters.',
        ]);
    }

    public function change_password(Request $request){
        try {
            $this->change_validator($request->all())->validate();

            $customer = Customer::where('email', $request->reset_email)->first();
            if($customer){
                $user = Customer::where('email', $request->reset_email)->update(['password' => Hash::make($request->new_password)]);

                return response()->json([
                    'status' => true,
                    'message' => 'Your password has been successfully changed!',
                    'data' => [],
                ], 200);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'No record Found!',
                    'errors' => 'No record Found!',
                ], 400);
            }

        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $this->transformErrors($e),
                'errors' => $e->getMessage(),
            ], 400);
        }
    }


    // transform the error messages,
    private function transformErrors(ValidationException $exception)
    {
        $errors = [];

        foreach ($exception->errors() as $field => $message) {
            //    $errors[] = [
            //        'field' => $field,
            //        'message' => $message,
            //    ];
            $errors[] = $message;     
        }

        return $errors;
    }
    

    
}
