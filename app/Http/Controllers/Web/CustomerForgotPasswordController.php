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
          'email_address' => 'required|email|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ix'
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
        $this->validator($request->all())->validate();
       
        $token = Str::random(64);

        DB::table('password_reset_tokens')->where(['email'=> $request->email_address])->delete();

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email_address, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);

        $data = array();
        
        Mail::to($request->email_address)->send(new ForgetPasswordMail($token));
        
        return redirect('/')->withSuccess('We have e-mailed your password reset link!');

    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function showResetPasswordForm($token) { 

        $getData = DB::table('password_reset_tokens')->where(['token' => $token])->first();
        
        return view('welcome', ['token' => $token,'email'=>$getData->email]);
    }
}
