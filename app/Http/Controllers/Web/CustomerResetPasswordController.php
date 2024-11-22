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
    { //dd($request);
        $this->validator($request->all())->validate();
       
        $updatePassword = DB::table('password_reset_tokens')
                            ->where([
                                'email' => $request->user_email, 
                                'token' => $request->token
                            ])
                            ->first();
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = Customer::where('email', $request->user_email)
                    ->update(['password' => Hash::make($request->new_password)]);

        DB::table('password_reset_tokens')->where(['email'=> $request->user_email])->delete();

        //return redirect('/')->with('message', 'Your password has been changed!');
        return redirect('/')->withSuccess('Your password has been changed!');
    }
}
