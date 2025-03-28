<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Enquiry;
use App\Models\EnquiryItems;
use App\Models\Order;
use App\Models\OrderItems;
use App\Http\Requests\API\AddCartRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function addToCart(AddCartRequest $request)
    {
      $data = $request->only('product_id','quantity','color_code');
      $data['customer_id'] = $request->user()->id;
      if($data['quantity'] > 0){
        Cart::updateOrCreate(['product_id'=>$data['product_id'], 'customer_id'=>$data['customer_id'],
              'color_code'=>$data['color_code']],$data);
        return response()->json([
          'status' => true,
          'message' => 'Product added to cart successfully.',
        ]);
      }else{
        Cart::where(['product_id'=>$data['product_id'], 'customer_id'=>$data['customer_id']])->delete();
        return response()->json([
          'status' => true,
          'message' => 'Product removed successfully.',
        ]);
      }
    }

    public function deleteCart($id)
    {
      Cart::find($id)->delete();
      return response()->json([
        'status' => true,
        'message' => 'Product removed successfully.',
      ]);
    }

    public function getCart(Request $request)
    {
      $carts = [];
      foreach ($request->user()->carts as $key => $cart) {
        $carts[$key]['id'] = $cart->id;
        $carts[$key]['product_id'] = $cart->product->id;
        $carts[$key]['quantity'] = $cart->quantity;
        $carts[$key]['title'] = $cart->product->title??'';
        $carts[$key]['subtitle'] = $cart->product->subtitle??'';
        $carts[$key]['color_code'] = $cart->color_code;
        $carts[$key]['width'] = $cart->product->width;
        $carts[$key]['pick'] = $cart->product->pick;
        $carts[$key]['count'] = $cart->product->count;
        $carts[$key]['reed'] = $cart->product->reed;
        $carts[$key]['image_url'] = count($cart->product->image_list) > 0 ? $cart->product->image_list[0] : null;
      }

      return response()->json([
        'status' => true,
        'carts' => $carts,
      ]);
    }

    public function submitEnquiry(Request $request)
    {
      if($request->enquery_type == 'custom')
      {
        $enquiry = $request->only('enquery_type','category_id','subcategory_id','width',
                        'warp','weft','count','reed','pick');
        $enquiry['customer_id'] = $request->user()->id;
        Enquiry::create($enquiry);
        return response()->json([
          'status' => true,
          'message' => 'Request submitted successfully.',
        ]);
      } else {
        if(count($request->user()->carts) == 0) {
          return response()->json([
            'status' => false,
            'message' => 'Please add items to cart.',
          ]);
        }
        $enquiry_data['enquery_type'] = 'selected';
        $enquiry_data['customer_id'] = $request->user()->id;
        $enquiry = Enquiry::create($enquiry_data);
        $item['enquery_id'] = $enquiry->id;
        foreach ($request->user()->carts as $key => $cart) {
          $item['product_id'] = $cart->product_id;
          $item['quantity'] = $cart->quantity;
          $item['color_code'] = $cart->color_code;
          $item['category_id'] = $cart->product->category_id;
          $item['subcategory_id'] = $cart->product->subcategory_id;
          $item['requirement_id'] = $cart->product->requirement_id;
          $item['title'] = $cart->product->title??'';
          $item['subtitle'] = $cart->product->subtitle??'';
          $item['description'] = $cart->product->description??'';
          $item['key_features'] = $cart->product->key_features??'';
          $item['disclaimer'] = $cart->product->disclaimer??'';
          $item['disclaimer'] = $cart->product->disclaimer??'';
          $item['disclaimer'] = $cart->product->disclaimer??'';
          $item['width'] = $cart->product->width;
          $item['warp'] = $cart->product->warp;
          $item['weft'] = $cart->product->weft;
          $item['pick'] = $cart->product->pick;
          $item['count'] = $cart->product->count;
          $item['reed'] = $cart->product->reed;
          EnquiryItems::create($item);
          Cart::find($cart->id)->delete();
        }
        return response()->json([
          'status' => true,
          'message' => 'Request submitted successfully.',
        ]);
      }
    }

    public function revokeEnquiry(Request $request)
    {
      $data = $request->only('invoke_reason');
      $data['status'] = 'invoked';
      $data['revoked_at'] = now();
      Enquiry::where('id', $request->enquiry_id)->update($data);
      return response()->json([
        'status' => true,
        'message' => 'Quote revoked successfully.',
      ]);
    }

    public function quotes(Request $request)
    {
      $query = Enquiry::where('customer_id', $request->user()->id);
      if($request->status == 2){
        $query->whereIn('status', ['submitted']);
      }else if($request->status == 3){
        $query->whereIn('status', ['accepted']);
      }else {
        $query->whereIn('status', ['invoiced','invoked']);
      }
      $enquiries = $query->latest()->get();
      $quotes = [];
      foreach ($enquiries as $key => $enquiry) {
        $quotes[$key]['id'] = $enquiry->id;
        if($enquiry->enquery_type == 'custom'){
          $quotes[$key]['title'] = 'Custom';
          $quotes[$key]['category'] = $enquiry->category->name??'';
          $quotes[$key]['subcategory'] = $enquiry->subcategory->name??'';
          $quotes[$key]['width'] = $enquiry->width;
          $quotes[$key]['warp'] = $enquiry->warp;
          $quotes[$key]['weft'] = $enquiry->weft;
          $quotes[$key]['count'] = $enquiry->count;
          $quotes[$key]['reed'] = $enquiry->reed;
          $quotes[$key]['pick'] = $enquiry->pick;
          $quotes[$key]['image'] = null;
        }else{
          $item = $enquiry->items->first();
          $quotes[$key]['title'] = $item->title;
          $quotes[$key]['category'] = $item->category->name??'';
          $quotes[$key]['subcategory'] = $item->subcategory->name??'';
          $quotes[$key]['width'] = $item->width;
          $quotes[$key]['warp'] = $item->warp;
          $quotes[$key]['weft'] = $item->weft;
          $quotes[$key]['count'] = $item->count;
          $quotes[$key]['reed'] = $item->reed;
          $quotes[$key]['pick'] = $item->pick;
          $quotes[$key]['image'] = $item->product->image_list[0] ?? null;
        }
        $quotes[$key]['status'] = $enquiry->status;
        $quotes[$key]['revoked_on'] = $enquiry->revoked_at ? \Carbon\Carbon::parse($enquiry->revoked_at)->format('jS M Y') : null ;
        $quotes[$key]['created_on'] =  \Carbon\Carbon::parse($enquiry->created_at)->format('jS M Y');
      }
      return response()->json([
        'status' => true,
        'quotes' => $quotes,
      ]);
    }

    public function accept($id, Request $request)
    {
      $enquiry = Enquiry::find($id);
      $order_data['customer_id'] = $request->user()->id;
      $order_data['invoice_no'] = Str::upper(Str::random(10));
      $order_data['status'] = 'Pending';
      $order_data['enquiry_id'] = $enquiry->id;
      $order_data['qutation'] = $enquiry->qutation;
      $order_data['qutation'] = $enquiry->qutation;
      $order_data['manufacturer_id'] = $enquiry->manufacturer_id;
      $order = Order::create($order_data);
      $item['order_id'] = $order->id;
      $item['customer_id'] = $request->user()->id;
      if($enquiry->enquery_type == 'custom') {
        $item['category_id'] = $enquiry->category_id;
        $item['subcategory_id'] = $enquiry->category_id;
        $item['category'] = $enquiry->category->name;
        $item['subcategory'] = $enquiry->subcategory->name;
        $item['width'] = $enquiry->category_id;
        $item['warp'] = $enquiry->category_id;
        $item['weft'] = $enquiry->category_id;
        $item['count'] = $enquiry->category_id;
        $item['reed'] = $enquiry->category_id;
        $item['pick'] = $enquiry->category_id;
        OrderItems::create($item);
      }else {
        foreach ($enquiry->items as $key => $item_data) {
          $item['product_id'] = $item_data->product_id;
          $item['quantity'] = $item_data->quantity;
          $item['category'] = $item_data->category->name;
          $item['subcategory'] = $item_data->subcategory->name;
          $item['category_id'] = $item_data->category_id;
          $item['subcategory_id'] = $item_data->category_id;
          $item['title'] = $item_data->title;
          $item['subtitle'] = $item_data->subtitle;
          $item['description'] = $item_data->description;
          $item['key_features'] = $item_data->key_features;
          $item['disclaimer'] = $item_data->disclaimer;
          $item['width'] = $item_data->category_id;
          $item['warp'] = $item_data->category_id;
          $item['weft'] = $item_data->category_id;
          $item['count'] = $item_data->category_id;
          $item['pick'] = $item_data->category_id;
          $item['reed'] = $item_data->category_id;
          OrderItems::create($item);
        }
      }
      $enquiry->update(['status' => 'accepted']);
      return response()->json([
        'status' => true,
        'message' => 'Order placed successfully.'
      ]);
    }

    public function orders(Request $request)
    {
      $orders_data = Order::where('customer_id', $request->user()->id)->latest()->get();
      $orders = [];
      foreach ($orders_data as $key => $order) {
        $orders[$key]['id'] = $order->id;
        $orders[$key]['invoice_no'] = $order->invoice_no;
        $orders[$key]['qutation'] = $order->qutation ? asset($order->qutation) : null;
        $orders[$key]['track_link'] = $order->track_link;
        $orders[$key]['status'] = $order->status;
        $orders[$key]['created_at'] = $order->created_at;
        $items = array();
        foreach($order->items as $_key => $item){
          $items[$_key]['quantity'] = $item->quantity ;
          $items[$_key]['color_code'] = $item->color_code ;
          $items[$_key]['title'] = $item->title ;
          $items[$_key]['subtitle'] = $item->subtitle ;
          $items[$_key]['width'] = $item->width ;
          $items[$_key]['warp'] = $item->warp ;
          $items[$_key]['weft'] = $item->weft ;
          $items[$_key]['count'] = $item->count ;
          $items[$_key]['reed'] = $item->reed ;
          $items[$_key]['pick'] = $item->pick ;
          $items[$_key]['reed'] = $item->reed ;
          $items[$_key]['category'] = $item->category ;
          $items[$_key]['subcategory'] = $item->subcategory ;
          $items[$_key]['image'] = $item->product ? (count($item->product->image_list) > 0 ? $item->product->image_list[0] : null) : null;
        }
        $orders[$key]['items'] = $items;
      }
      return response()->json([
        'status' => true,
        'orders' =>  $orders
      ]);
    }

    public function revokeOrder(Request $request)
    {
      $data = $request->only('revoke_reason');
      $data['status'] = 'Revoked';
      $data['revoked_at'] = now();
      Order::where('id', $request->order_id)->update($data);
      return response()->json([
        'status' => true,
        'message' => 'Order revoked successfully.',
      ]);
    }


}