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
use App\Mail\OtpMail;
use Illuminate\Validation\ValidationException;
class CustomerForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
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
          'email_address' => 'required|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ix'
        ],
        [
            'email_address.required' =>'The email field is required.',
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function forgetpassword(Request $request)
    {
        try {    
            $this->validator($request->all())->validate();
                
            $customer = Customer::where('email', $request->email_address)->first();
            if($customer){
                $otp = rand(1000, 9999);
                $customer->update([
                    'otp' => $otp
                ]);
                
                try {
                    Mail::to($request->email_address)->send(new OtpMail($otp));

                    return response()->json([
                        'status' => true,
                        'message' => 'OTP successfully sent your registered email!',
                        'data' => array('otp'=>$otp,'email'=>$request->email_address),
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
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Please enter registered email!!',
                    'errors' => 'Please enter registered email!!',
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
     * Get a validator for an incoming otp valid request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function otpvalidator(array $data)
    {
        return Validator::make($data, [
          'otp' => 'required|min:4'
        ],
        [
            'otp.required' =>'The otp field is required.',
            'otp.min' =>'Please enter valid 4 digit otp.',
        ]);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function forgototpverify(Request $request)
    {
        try {
            $this->otpvalidator($request->all())->validate();
            $customer = Customer::where(['email'=>$request->email_otp, 'otp'=>$request->otp])->first();
            if($customer)
                return response()->json([
                    'status' => true,
                    'message' => 'OTP matched successfully',
                    'data' => array('otp'=>$request->otp,'email'=>$request->email_otp),
                ], 200);
            else
            return response()->json([
                'status' => false,
                'message' => 'Please enter a valid OTP!',
                'errors' => 'Please enter a valid OTP!',
            ], 400);
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $this->transformErrors($e),
                'errors' => $e->getMessage(),
            ], 400);
        }
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function resent_otp(Request $request)
    {
        try {
            $customer = Customer::where('email', $request->email_otp)->first();
            if($customer){
                $otp = rand(1000, 9999);
                $customer->update([
                    'otp' => $otp
                ]);
                
                try {
                    Mail::to($request->email_otp)->send(new OtpMail($otp));

                    return response()->json([
                        'status' => true,
                        'message' => 'OTP Resend successfully!',
                        'data' => $otp,
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
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Please entered registered email!!',
                    'errors' => 'Please entered registered email!!',
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
