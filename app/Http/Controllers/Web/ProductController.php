<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Requirement;
use App\Models\Tag;
use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['products'] = Product::all();
        $data['categories'] = Category::get();
        $data['subcategories'] = Subcategory::get();
        $data['requirements'] = Requirement::get();
        $data['tags'] = Tag::get();
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;
        return view('product.index',$data);
    }

    public function productdetail($id)
    {
        $data['products_data'] = Product::find($id);
        $data['products'] = Product::all();
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;
        return view('product.productdetail',$data);
    }

    public function productcart()
    {
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;
        return view('product.productcart',$data);
    }
}
