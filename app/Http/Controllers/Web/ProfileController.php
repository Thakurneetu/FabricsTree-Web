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
        $customer = Customer::find($id);//dd($customer);
        $data['customer'] = $customer;
        if(@$customer->user_type==''){
            return redirect('/')->withError('Session Expired');
        }
        return view('user.index',$data);
    }

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
          
          //'email' => 'required|email|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ix|unique:customers',
          //'phone' => 'required|min:10|max:10|unique:customers',
           'email' => 'required|email|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ix',
          'phone' => 'required|min:10|max:10',
          'address' => 'required',
          'pincode' => 'required|integer',
        ],
        [
            'email.required' =>'The email field is required.',
            //'email.unique' => 'The email has already exist.',
            'phone.required' => 'The mobile no. field is required.',
            //'phone.unique' => 'The mobile no. has already exist.',
            //'phone.min' => 'The mobile no. must be at least 8 digits.'
            'pincode.integer' => 'The pincode field must be an numeric.',
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
          //'email' => 'required|email|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ix|unique:customers',
          //'phone' => 'required|min:10|max:10|unique:customers',
          'email' => 'required|email|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ix',
          'phone' => 'required|min:10|max:10',
          'store_contact' => 'required|min:10|max:10',
          'store_address' => 'required',
          'gst_no' => 'required',
          'pincode' => 'required|integer',
        ],
        [
            'email.required' =>'The email field is required.',
            //'email.unique' => 'The email has already exist.',
            'phone.required' => 'The mobile no. field is required.',
            //'phone.unique' => 'The mobile no. has already exist.',
            //'phone.min' => 'The mobile no. must be at least 8 digits.',
            'pincode.integer' => 'The pincode field must be an numeric.',
        ]);
    }

    public function update_profile(Request $request){
        try {
            if($request->user_type=='Customer'){
                $this->validator_customer($request->all())->validate();
            }else{
                $this->validator_manufacture($request->all())->validate();
            }

            $customer = Customer::where('email', $request->email)->first();
            if($customer){

                if($request->user_type=='Customer')
                {
                    $user = Customer::where('email', $request->email)->update(['name' => $request->name,'address' => $request->address,'pincode' => $request->pincode]);

                }else{

                    if ($request->hasFile('store_logo')) {
                        $image = $request->file('store_logo');
                        $imageName = time().'_'.$image->getClientOriginalName();
                        $image->move(public_path('uploads/store_logo'), $imageName);
                        $store_logo = 'uploads/store_logo/' . $imageName;
                       
                        $user = Customer::where('email', $request->email)->update(['name' => $request->manufacturer_name,'address' => $request->store_address,'pincode' => $request->pincode,'firm_name' => $request->store_name,'gst_number' => $request->gst_no,'store_contact' => $request->store_contact,'store_logo' => $store_logo]);

                    }else{
                        
                        $user = Customer::where('email', $request->email)->update(['name' => $request->manufacturer_name,'address' => $request->store_address,'pincode' => $request->pincode,'firm_name' => $request->store_name,'gst_number' => $request->gst_no,'store_contact' => $request->store_contact]);
                    }
                }

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
