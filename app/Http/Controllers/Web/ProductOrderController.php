<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Enquiry;
use App\Models\EnquiryItems;
use App\Models\Order;
use App\Models\OrderItems;

class ProductOrderController extends Controller
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
        $data['orders'] = Order::where('customer_id',$id)->get();
        //dd($data['orders']);
        return view('product.orders',$data);
    }

    

    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orderitems($order_id)
    {
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;
        $data['order_items'] = OrderItems::where(['customer_id'=>$id,'order_id'=>$order_id])->get();
        //dd($data['order_items']);
        return view('product.orderitems',$data);
    }

    
    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function revokeorder()
    {
        return response()->json([
        'status' => true,
        'message' => 'Order revoked successfully.',
        ]);
    }
    
}
