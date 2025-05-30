<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\ContactUs;
use App\Mail\ContactusMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;
        return view('contactus',$data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
          'name' => 'required|min:2|max:50|string|max:255',
          //'email' => 'required|email|string|max:255|regex:/^([a-z0-9+-]+)(.[a-z0-9+-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/ix|unique:customers',
          
          //'email' => 'required|email|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ix|unique:customers',
          //'phone' => 'required|min:10|max:10|unique:customers',
           'email' => 'required|email|string|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ix',
          'phone' => 'required|min:10|max:10',
          'message' => 'required',
        ],
        [
            'email.required' =>'The email field is required.',
            //'email.unique' => 'The email has already exist.',
            'phone.required' => 'The mobile no. field is required.',
            //'phone.unique' => 'The mobile no. has already exist.',
            'phone.min' => 'The mobile no. must be at least 10 digits.'
        ]);
    }

    public function save_contactus(Request $request){
        try {
            $this->validator($request->all())->validate();

            $contactus = new ContactUs();
            $contactus->name = $request->name;
            $contactus->email = $request->email;
            $contactus->phone = $request->phone;
            $contactus->message = $request->message;
            $contactus->save();
            
            Mail::to('bloombugsfabric@gmail.com')->send(new ContactusMail($contactus));
           
            return response()->json([
                'status' => true,
                'message' => 'You have been successfully submitted your contact info, Administrator will you contact shortly.',
            ], 200);
           
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

    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function aboutus()
    {
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;
        return view('aboutus',$data);
    }
}
