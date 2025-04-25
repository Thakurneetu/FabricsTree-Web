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
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProductOrderController extends Controller
{
    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        
        $data['customer'] = $customer;
        $data['orders'] = array();

        if(@$customer->user_type=='Customer'){
            //$orders = Order::where('customer_id',$id)->get();
            $query = Order::where('customer_id', $id);
        }else if(@$customer->user_type=='Manufacturer'){
            //$orders = Order::where('manufacturer_id',$id)->get();
            $query = Order::where('manufacturer_id', $id);
        }else{
            return redirect('/')->withError('Session Expired');
        }

        if($request->status!='All' && $request->status!=""){
            $filters = explode(',',$request->input('status'));
            $query->whereIn('status',$filters);
        }else{
            $filters = explode(',',$request->input('status'));
            $query->whereNotIn('status',$filters);
        }
        $orders = $query->latest()->get();
        //dd($orders);

        // After you've built your $enquiry array
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 25;
        $enquiryCollection = collect($orders); // convert array to Collection
        $currentItems = $enquiryCollection->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginatedOrders = new LengthAwarePaginator(
            $currentItems,
            $enquiryCollection->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $data['orders'] = $paginatedOrders;
        
        //dd($data['orders']);
        //return view('product.orders',$data);
        if($request->status)
        {
            $dataHtml  = view('product.ordersData',$data)->render();

            return response()->json([
            'status' => true,
            'message' => 'Get successfully.',
            'data'=>$dataHtml
            ]);

        }else{

            return view('product.orders',$data);
        }
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
        $data['order_items'] = array();
        if(@$customer->user_type=='Customer'){
            $data['order_items'] = OrderItems::where(['customer_id'=>$id,'order_id'=>$order_id])->get();
        }else if(@$customer->user_type=='Manufacturer'){
            $data['order_items'] = OrderItems::where(['order_id'=>$order_id])->get();
        }else{
            return redirect('/')->withError('Session Expired');
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
