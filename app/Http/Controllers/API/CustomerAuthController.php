<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Http\Requests\API\CustomerLoginRequest;
use App\Http\Requests\API\CustomerRegisterRequest;
use App\Http\Requests\API\ForgotPasswordRequest;
use App\Http\Requests\API\ResetPasswordRequest;
use App\Http\Requests\API\verifyOtpRequest;
use App\Http\Requests\API\ProfileRequest;
use App\Mail\OtpMail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class CustomerAuthController extends Controller
{
    public function login(CustomerLoginRequest $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $customer = Customer::where('email', $request->email)->first();

        if (!$customer || !Hash::check($request->password, $customer->password)) {
            return response()->json([
              'status' => false,
              'message' => 'Invalid credentials'
            ], 500);
        }

        $token = $customer->createToken('customer-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'access_token' => $token,
            'bearer' => 'Bearer '.$token,
        ]);
    }

    public function register(CustomerRegisterRequest $request)
    {
      try {
        // Create the customer
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'pincode' => $request->pincode,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        // Generate a Sanctum token
        $token = $customer->createToken('customer-token')->plainTextToken;

        Mail::to($customer->email)->send(new WelcomeMail($customer));

        // Return response with the token
        return response()->json([
            'status' => true,
            'message' => 'Your account has been created successfully.',
            'access_token' => $token,
            'bearer' => 'Bearer '.$token,
            'customer' => $customer,
        ], 200);
      } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage(),
            'errors' => $th->getMessage(),
        ], 500);
      }
    }

    public function sendForgotOTP(ForgotPasswordRequest $request)
    {
        try {
            $customer = Customer::where('email', $request->email)->first();
            $otp = rand(1000, 9999);
            $customer->update([
                'otp' => $otp
            ]);
            Mail::to($request->email)->send(new OtpMail($otp));
            return response()->json([
                'status' => true,
                'message' => 'OTP Sent Successfully!!',
                'otp_for_testing' => (string)$otp  // TODO::Remove
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        try {
            $customer = Customer::where('email', $request->email)->first();
            if($customer->otp == $request->otp){
              $customer->update([
                  'password' => Hash::make($request->password),
                  'otp' => ''
              ]);
              return response()->json([
                  'status' => true,
                  'message' => 'Password Updated Successfully!!'
              ],200);
            }
            else{
              return response()->json([
                  'status' => false,
                  'message' => 'Please enter a valid OTP!'
              ],500);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function verifyOTP(verifyOtpRequest $request)
    {
        try {
            $customer = Customer::where(['email'=>$request->email, 'otp'=>$request->otp])->first();
            if($customer)
            return response()->json([
                'status' => true,
                'message' => 'OTP matched Successfully!'
            ],200);
            else
            return response()->json([
              'status' => false,
              'message' => 'Please enter a valid OTP!',
            ],500);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function profile(ProfileRequest $request){
      try {
        $data = $request->only('name', 'email', 'phone', 'pincode', 'address');
        if($request->password != ''){
          $data['password'] = Hash::make($request->password);
        }
        $customer = $request->user()->update($data);

        // Return response with the token
        return response()->json([
            'status' => true,
            'message' => 'Your account has been updated successfully.',
            'customer' => $request->user(),
        ], 200);
      } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage(),
            'errors' => $th->getMessage(),
        ], 500);
      }
    }
}
