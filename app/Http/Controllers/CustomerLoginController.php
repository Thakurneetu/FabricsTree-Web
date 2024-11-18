<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\GlobalSetting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CustomerLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
       // $this->middleware('guest')->except('logout');

    }

    protected function credentials(\Illuminate\Http\Request $request)
    {
        //return $request->only($this->username(), 'password');
        return [
            'email' => $request->{$this->username()},
            'password' => $request->password,
           // 'status' => 'active'
        ];
    }

    protected function validateLogin(\Illuminate\Http\Request $request)
    {

        $rules = [
            $this->username() => 'required|string',
            'password' => 'required|string'
        ];
        // User type from email/username
        $user = Customer::where($this->username(), $request->{$this->username()})->first();
        if(!empty($user)){
            if(@$user->status=='inactive'){
                throw ValidationException::withMessages([
                    $this->username() => [trans('auth.inactive')],
                ]);
            }
        }

        $this->validate($request, $rules);
    }
    
    public function logout(Request $request)
    {
        $user = auth()->user();
        $this->guard()->logout();

        $request->session()->invalidate();

        if ($user->is_superadmin) {
            return $this->loggedOut($request) ?: redirect(route('front.super-admin-login'));
        }
        return redirect(route('login'));
        
    }

}
