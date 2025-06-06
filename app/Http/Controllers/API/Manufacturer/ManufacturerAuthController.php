<?php

namespace App\Http\Controllers\API\Manufacturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\Customer;
use App\Http\Requests\API\Manufacturer\LoginRequest;
use App\Http\Requests\API\Manufacturer\RegisterRequest;
use App\Http\Requests\API\Manufacturer\ProfileRequest;

class ManufacturerAuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $manufacturer = Customer::where('email', $request->email)->first();

        if (!$manufacturer || !Hash::check($request->password, $manufacturer->password)) {
          return response()->json([
            'status' => false,
            'message' => 'Invalid credentials'
          ], 500);
        }

        if ($manufacturer->status != 1) {
          return response()->json([
            'status' => false,
            'message' => 'Your account has been blocked.'
          ], 500);
        }

        $token = $manufacturer->createToken('manufacturer-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'access_token' => $token,
            'bearer' => 'Bearer '.$token,
        ]);
    }

    public function register(RegisterRequest $request)
    {
      try {
        // Create the customer
        $user = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'pincode' => $request->pincode,
            'address' => $request->address,
            'firm_name' => $request->firm_name,
            'gst_number' => $request->gst_number,
            'status' => 0,
            'store_contact' => $request->store_contact,
            'password' => Hash::make($request->password),
            'user_type' => 'Manufacturer'
        ]);

        if($request->hasFile('store_logo')){
          $logo = $this->saveImage($request->store_logo, '/uploads/store_logo');
          $user->store_logo = $logo;
          $user->save();
        }

        // Generate a Sanctum token
        $token = $user->createToken('manufacturer-token')->plainTextToken;

        // Mail::to($customer->email)->send(new WelcomeMail($customer));

        // Return response with the token
        return response()->json([
            'status' => true,
            'message' => 'Your account has been created successfully.',
            'access_token' => $token,
            'bearer' => 'Bearer '.$token,
            'user' => $user,
        ], 200);
      } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage(),
            'errors' => $th->getMessage(),
        ], 500);
      }
    }

    public function profile(ProfileRequest $request){
      try {
        $data = $request->only('name', 'email', 'phone', 'pincode', 'address','firm_name', 'gst_number','store_contact');
        if($request->password != ''){
          $data['password'] = Hash::make($request->password);
        }
        $request->user()->update($data);

        // Return response with the token
        return response()->json([
            'status' => true,
            'message' => 'Your account has been updated successfully.',
            'customer' => Customer::find($request->user()->id)
        ], 200);
      } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage(),
            'errors' => $th->getMessage(),
        ], 500);
      }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
          'status' => true,
          'message' => 'Successfully logged out'
        ]);
    }

    private function saveImage($file, $store_path){
      $extension = File::extension($file->getClientOriginalName());
      $filename = random_int(10,99).date('YmdHis').random_int(10,99).'.'.$extension;
      $file->move(public_path($store_path), $filename);
      return $store_path.'/'.$filename;
    }

    public function changePassword(Request $request){
      $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|confirmed',
      ]);
      $user = $request->user();

      if (!Hash::check($request->old_password, $user->password)) {
        return response()->json([
          'status' => false,
          'message' => 'The old password is incorrect.'
        ]);
      }
      $data['password'] = Hash::make($request->password);
      $user->update($data);
      return response()->json([
        'status' => true,
        'message' => 'Password Changed Successfully.'
      ]);
    }
}
