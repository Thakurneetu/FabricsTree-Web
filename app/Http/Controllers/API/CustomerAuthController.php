<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Http\Requests\API\CustomerLoginRequest;
use App\Http\Requests\API\CustomerRegisterRequest;

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
}
