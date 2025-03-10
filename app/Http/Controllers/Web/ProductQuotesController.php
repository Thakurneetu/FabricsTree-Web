<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\EnquiryItems;
class ProductQuotesController extends Controller
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
        //dd($customer->enquiry);
        $enquiry = [];
        $enquiry_items_data = [];
        foreach ($customer->enquiry as $key => $val) {
           /// dd($enquiry->id);
               $enquiry[$key]['enquiry_id'] = $val->id;
               $enquiry[$key]['customer_id'] = $val->customer_id;
               $enquiry[$key]['enquery_type'] = $val->enquery_type;
               $enquiry[$key]['status'] = $val->status;
               $enquiry[$key]['created_at'] = date('d M, Y H:i A',strtotime($val->created_at));
               $enquiry_items = EnquiryItems::where('enquery_id',$val->id)->get();
               foreach ($enquiry_items as $k => $v) {
                    $enquiry_items_data[$k]['enquiry_item_id'] = $v->id;
                    $enquiry_items_data[$k]['product_id'] = $v->product_id;
                    $enquiry_items_data[$k]['enquery_id'] = $v->enquery_id;
                    $enquiry_items_data[$k]['quantity'] = $v->quantity;
                    $enquiry_items_data[$k]['color_code'] = $v->color_code;
                    $enquiry_items_data[$k]['created_at'] = $v->created_at;
                    $enquiry_items_data[$k]['title'] = $v->title;
                    $enquiry_items_data[$k]['subtitle'] = $v->subtitle;
                    $enquiry_items_data[$k]['description'] = $v->description;
                    $enquiry_items_data[$k]['key_features'] = $v->key_features;
                    $enquiry_items_data[$k]['disclaimer'] = $v->disclaimer;
                    $enquiry_items_data[$k]['category_id'] = $v->category_id;
                    $enquiry_items_data[$k]['subcategory_id'] = $v->subcategory_id;
                    $enquiry_items_data[$k]['requirement_id'] = $v->requirement_id;
                    $enquiry_items_data[$k]['width'] = $v->width;
                    $enquiry_items_data[$k]['warp'] = $v->warp;
                    $enquiry_items_data[$k]['weft'] = $v->weft;
                    $enquiry_items_data[$k]['count'] = $v->count;
                    $enquiry_items_data[$k]['reed'] = $v->reed;
                    $enquiry_items_data[$k]['pick'] = $v->pick;
               }
               $enquiry[$key]['enquiry_items'] = $enquiry_items_data;
        }
        $data['request_quote'] = $enquiry;
       // dd($data);
        return view('product.productquotes',$data);
    }


    public function quotesitems($id)
    {
        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);
        $data['customer'] = $customer;
        //dd($customer->enquiry);
        $enquiry_items_data = [];
        
        $enquiry_items = EnquiryItems::where('enquery_id',$id)->get();
        foreach ($enquiry_items as $k => $v) {
            $enquiry_items_data[$k]['enquiry_item_id'] = $v->id;
            $enquiry_items_data[$k]['product_id'] = $v->product_id;
            $enquiry_items_data[$k]['enquery_id'] = $v->enquery_id;
            $enquiry_items_data[$k]['quantity'] = $v->quantity;
            $enquiry_items_data[$k]['color_code'] = $v->color_code;
            $enquiry_items_data[$k]['created_at'] = $v->created_at;
            $enquiry_items_data[$k]['title'] = $v->title;
            $enquiry_items_data[$k]['subtitle'] = $v->subtitle;
            $enquiry_items_data[$k]['description'] = $v->description;
            $enquiry_items_data[$k]['key_features'] = $v->key_features;
            $enquiry_items_data[$k]['disclaimer'] = $v->disclaimer;
            $enquiry_items_data[$k]['category_id'] = $v->category_id;
            $enquiry_items_data[$k]['subcategory_id'] = $v->subcategory_id;
            $enquiry_items_data[$k]['requirement_id'] = $v->requirement_id;
            $enquiry_items_data[$k]['width'] = $v->width;
            $enquiry_items_data[$k]['warp'] = $v->warp;
            $enquiry_items_data[$k]['weft'] = $v->weft;
            $enquiry_items_data[$k]['count'] = $v->count;
            $enquiry_items_data[$k]['reed'] = $v->reed;
            $enquiry_items_data[$k]['pick'] = $v->pick;
            $enquiry_items_data[$k]['image_url'] = asset('frontend/images/Frame 176.png' );
            
        }
        $data['enquiry_items'] = $enquiry_items_data;
       
        return view('product.quotesitems',$data);
    }

    
}
