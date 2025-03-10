<?php

namespace App\Http\Controllers\API\Manufacturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Manufacturer;
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

        $manufacturer = Manufacturer::where('email', $request->email)->first();

        if (!$manufacturer || !Hash::check($request->password, $manufacturer->password)) {
          return response()->json([
            'status' => false,
            'message' => 'Invalid credentials'
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
        $user = Manufacturer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'pincode' => $request->pincode,
            'address' => $request->address,
            'store_name' => $request->store_name,
            'gst' => $request->gst,
            'store_contact' => $request->store_contact,
            'password' => Hash::make($request->password),
        ]);

        if($request->hasFile('logo')){
          $logo = $this->save_image($request->image, '/uploads/logo');
          $user->logo = $logo;
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
        $data = $request->only('name', 'email', 'phone', 'pincode', 'address','store_name', 'gst','store_contact');
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

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
          'status' => true,
          'message' => 'Successfully logged out'
        ]);
    }

    private function save_image($file, $store_path){
      $extension = File::extension($file->getClientOriginalName());
      $filename = rand(10,99).date('YmdHis').rand(10,99).'.'.$extension;
      $file->move(public_path($store_path), $filename);
      return $store_path.'/'.$filename;
    }
}
