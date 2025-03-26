<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Helper\Reply;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use File;
class CustomerRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator_customer(array $data)
    {
        return Validator::make($data, [
          'name' => 'required|min:2|max:50|string|max:255',
          //'email' => 'required|email|string|max:255|regex:/^([a-z0-9+-]+)(.[a-z0-9+-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/ix|unique:customers',
          'email' => 'required|email|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ix|unique:customers',
          'phone' => 'required|min:10|max:10|unique:customers',
          'address' => 'required',
          'pincode' => 'required|integer',
          'password' => 'required|min:8',
          'password_confirmation'=>'required|min:8|same:password',
        ],
        [
            'email.required' =>'The email field is required.',
            'email.unique' => 'The email has already exist.',
            'phone.required' => 'The mobile no. field is required.',
            'phone.unique' => 'The mobile no. has already exist.',
            'phone.min' => 'The mobile no. must be at least 10 digits.',
            'pincode.integer' => 'The pincode field must be an numeric.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password_confirmation.required' => 'The confirm password field is required.',
            'password_confirmation.same' => 'The confirm password does not match.',
            'password_confirmation.min' => 'The confirm password must be at least 8 characters.',
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator_manufacture(array $data)
    {
        return Validator::make($data, [
          'manufacturer_name' => 'required|min:2|max:50|string|max:255',
          'store_name' => 'required|min:2|max:50|string|max:255',
          //'email' => 'required|email|string|max:255|regex:/^([a-z0-9+-]+)(.[a-z0-9+-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/ix|unique:customers',
          'email' => 'required|email|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ix|unique:customers',
          'phone' => 'required|min:10|max:10|unique:customers',
          'store_contact' => 'required|min:10|max:10|unique:customers',
          'store_address' => 'required',
          'gst_no' => 'required',
          'pincode' => 'required|integer',
          'password' => 'required|min:8',
          'password_confirmation'=>'required|min:8|same:password',
        ],
        [
            'email.required' =>'The email field is required.',
            'email.unique' => 'The email has already exist.',
            'phone.required' => 'The mobile no. field is required.',
            'phone.unique' => 'The mobile no. has already exist.',
            'phone.min' => 'The mobile no. must be at least 10 digits.',
            'pincode.integer' => 'The pincode field must be an numeric.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password_confirmation.required' => 'The confirm password field is required.',
            'password_confirmation.same' => 'The confirm password does not match.',
            'password_confirmation.min' => 'The confirm password must be at least 8 characters.',
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        //dd( $request->all());
        try {
            if($request->user_type=='Customer'){
                $this->validator_customer($request->all())->validate();
            }else{
                $this->validator_manufacture($request->all())->validate();
            }
        
        event(new Registered($user = $request->all()));

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

            try{
                $customer = new Customer();
                if($request->user_type=='Customer')
                {
                    $customer->user_type = $request->user_type;
                    $customer->name = $request->name;
                    $customer->email = $request->email;
                    $customer->phone = $request->phone;
                    $customer->address = $request->address;
                    $customer->pincode = $request->pincode;
                    $customer->password = $request->password;
                    $customer->status = 0;
                }else{
                    // if($request->hasFile('store_logo')){
                    //     $customer->store_logo = $this->save_image($request->store_logo, '/uploads/store_logo');
                    //   }
                    // dd($request->all());
                    //dd($customer->store_logo);
                    $customer->user_type = $request->user_type;
                    $customer->name = $request->manufacturer_name;
                    $customer->firm_name = $request->store_name;
                    $customer->email = $request->email;
                    $customer->phone = $request->phone;
                    $customer->address = $request->store_address;
                    $customer->store_contact = $request->store_contact;
                    $customer->pincode = $request->pincode;
                    $customer->gst_number = $request->gst_no;
                    $customer->password = $request->password;
                    $customer->status = 0;
                }
                
                Mail::to($customer->email)->send(new WelcomeMail($customer));

                $customer->save();

                return response()->json([
                    'status' => true,
                    'message' => 'Your account has been created successfully.',
                    'data' => $customer,
                ], 200);
            }
            catch(\Exception $e){
            //  dd($e);
                return response()->json([
                    'status' => false,
                    'message' => 'Mail Not Sent',
                    'errors' => $e->getMessage(),
                ], 400);
            }
       
       
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $this->transformErrors($e),//$e->getMessage()
                'errors' => $e->getMessage(),
            ], 400);
        }
    }

    // public function uploadstorelogo(Request $request)
    // {
    //     //dd($_REQUEST);
    //  dd($request->all());
    //     // if($request->hasFile('store_logo')){
    //     //     $store_logo = $this->save_image($request->store_logo, '/uploads/store_logo');
    //     // }
             
    // }
    

    // private function save_image($file, $store_path){
    //     $extension = File::extension($file->getClientOriginalName());
    //     $filename = rand(10,99).date('YmdHis').rand(10,99).'.'.$extension;
    //     $file->move(public_path($store_path), $filename);
    //     return $store_path.'/'.$filename;
    //   }

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
