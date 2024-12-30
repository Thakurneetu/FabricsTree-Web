<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Http\Requests\API\AddCartRequest;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function addToCart(AddCartRequest $request)
    {
      $data = $request->only('product_id','quantity','color_code');
      $data['customer_id'] = $user = $request->user()->id;
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
        $carts[$key]['quantity'] = $cart->quantity;
        $carts[$key]['title'] = $cart->product->title??'';
        $carts[$key]['subtitle'] = $cart->product->subtitle??'';
        $carts[$key]['color_code'] = $cart->color_code;
        $carts[$key]['width'] = $cart->product->width;
        $carts[$key]['pick'] = $cart->product->pick;
        $carts[$key]['count'] = $cart->product->count;
        $carts[$key]['reed'] = $cart->product->reed;
      }

      return response()->json([
        'status' => true,
        'carts' => $carts,
      ]);
    }
}
