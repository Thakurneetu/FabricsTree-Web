<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['products'] = Product::select("*")->inRandomOrder()->get();
        $data['testimonials'] = Testimonial::all();
        $data['categories'] = Category::get();
        $data['subcategories'] = Subcategory::get();
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;

        $carts = [];
        if(@$customer){
            if($customer->user_type=='Customer'){
                foreach ($customer->carts as $key => $cart) {
                    $carts[$key] = $cart->product->id;
                }
            }else{
                foreach ($customer->manufacturerProduct as $key => $manufacturer_product) {
                    $carts[$key] = $manufacturer_product->product->id;
                }
            }
        }
        $data['carts'] = $carts;
        
        return view('index',$data);
    }

    
}
