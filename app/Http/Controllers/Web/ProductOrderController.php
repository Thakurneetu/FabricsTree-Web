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
        $data['orders'] = array();
        if(@$customer->user_type=='Customer'){
            $data['orders'] = Order::where('customer_id',$id)->get();
        }else if(@$customer->user_type=='Manufacturer'){
            $data['orders'] = Order::where('manufacturer_id',$id)->get();
        }else{
            return redirect('/')->withError('Session Expired');
        }
        
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
        if($customer->user_type=='Customer'){
            $data['order_items'] = OrderItems::where(['customer_id'=>$id,'order_id'=>$order_id])->get();
        }else if($customer->user_type=='Manufacturer'){
            $data['order_items'] = OrderItems::where(['order_id'=>$order_id])->get();
        }
        //dd($data['order_items']);
        return view('product.orderitems',$data);
    }

    
    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function revokeorder(Request $request)
    {
        $data['revoke_reason'] =  $request->revoke_reason;
        $data['status'] = 'Revoked';
        $data['revoked_at'] = now();
        Order::where('id', $request->order_id)->update($data);
        return response()->json([
        'status' => true,
        'message' => 'Order revoked successfully.',
        ]);
    }


    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function returnorder(Request $request)
    {
        //$data['return_reason'] =  $request->return_reason;
        $data['status'] = 'Returned';
        //$data['returned_at'] = now();
        Order::where('id', $request->order_id)->update($data);
        return response()->json([
        'status' => true,
        'message' => 'Order returned successfully.',
        ]);
    }
    
}
