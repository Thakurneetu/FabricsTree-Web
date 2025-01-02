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
        // $this->validator($request->all())->validate();
       
        // $token = Str::random(64);

        // DB::table('password_reset_tokens')->where(['email'=> $request->email_address])->delete();

        // DB::table('password_reset_tokens')->insert([
        //     'email' => $request->email_address, 
        //     'token' => $token, 
        //     'created_at' => Carbon::now()
        // ]);

        // $data = array();
        
        // Mail::to($request->email_address)->send(new ForgetPasswordMail($token));
        
        // return redirect('/')->withSuccess('We have e-mailed your password reset link!');
        try {    
        $this->validator($request->all())->validate();
            
        $customer = Customer::where('email', $request->email_address)->first();
        if($customer){
            $otp = rand(1000, 9999);
            $customer->update([
                'otp' => $otp
            ]);
            
            Mail::to($request->email_address)->send(new OtpMail($otp));

            return response()->json([
                'status' => true,
                'message' => 'OTP successfully sent your registered email!',
                'data' => $otp,
            ], 200);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Please entered registered email!!',
                'errors' => 'Please entered registered email!!',
            ], 400);
        }

        //return redirect('/')->withSuccess('OTP successfully sent your registered email!');
           
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
          'otp[]' => 'required'
        ],
        [
            'otp.required' =>'The otp field is required.',
            //'otp.min' =>'Enter valid otp.',
        ]);
    }

    public function forgototpverify(Request $request)
    {
        try {
            $this->otpvalidator($request->all())->validate();
            $customer = Customer::where(['email'=>$request->email_address, 'otp'=>$request->otp])->first();
            if($customer)
                return response()->json([
                    'status' => true,
                    'message' => 'OTP matched successfully',
                    'data' => '',
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
    public function showResetPasswordForm($token) { 

        $getData = DB::table('password_reset_tokens')->where(['token' => $token])->first();
        if(!$getData){
            return redirect('/')->withError('Oppes! reset passowrd link is expired');
        }
        return view('index', ['token' => $token,'email'=>$getData->email]);
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
