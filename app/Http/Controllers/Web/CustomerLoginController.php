<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Helper\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
          'email_id' => 'required|email|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ix',
          'pwd' => 'required|min:8'
        ],
        [
            'email_id.required' =>'The email field is required.',
            'pwd.required' => 'The password field is required.',
        ]);
    }


   /**
     * Write code on Method
     *
     * @return response()
     */
    public function login(Request $request)
    {   
        $this->validator($request->all())->validate();
        
        $credentials = $request->only('email_id', 'pwd');
        $data = array();
        $data['email'] = $credentials['email_id'];
        $data['password'] = $credentials['pwd'];
        
        if (Auth::guard('customer')->attempt($data)) {
            return redirect()->intended(route("customer.dashboard"))->withSuccess('You have Successfully loggedin');
        }
        return redirect('/')->withError('Oppes! You have entered invalid credentials');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        if(Auth::guard('customer')->check()){
            return view('customer.dashboard');
        }
        return Redirect('/');   
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout()
    {
        Auth::guard('customer')->logout();
        Session::flush();
        
        return redirect('/')->withSuccess('You have successfully logout');

    }

}
