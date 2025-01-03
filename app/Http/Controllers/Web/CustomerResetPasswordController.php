<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class CustomerResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
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


    /**
    * Write code on Method
    *
    * @return response()
    */
    public function resetpassword(Request $request)
    {
        try {
            $this->validator($request->all())->validate();

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
