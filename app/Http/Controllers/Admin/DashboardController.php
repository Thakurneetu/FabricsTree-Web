<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $customers_count = Customer::where('user_type','Customer')->count();
      $manufacturers_count = Customer::where('user_type','Manufacturer')->count();
      $products_count = Product::count();
      $orders_count = Order::count();
      $topCustomers = Customer::where('user_type', 'Customer')
        ->withCount('orders')
        ->orderBy('orders_count', 'desc')
        ->take(10)
        ->get();
      $topManufacturers = Customer::where('user_type', 'Manufacturer')
        ->withCount('manufacturer_orders')
        ->orderBy('manufacturer_orders_count', 'desc')
        ->take(10)
        ->get();
      $topProducts = Product::withCount('order_products')
        ->orderBy('order_products_count', 'desc')
        ->take(10)
        ->get();
      $topLeastProducts = Product::withCount('order_products')
        ->orderBy('order_products_count', 'asc')
        ->take(10)
        ->get();
        // dd($topProducts);
      return view('admin.dashboard', compact('customers_count', 'manufacturers_count' ,'products_count',
                                    'orders_count', 'topCustomers', 'topManufacturers','topProducts',
                                    'topLeastProducts'));
    }

    public function theme($mode){
      $user = auth()->user();
      $user->theme = $mode;
      $user->save();
      return redirect()->back();
    }
}
