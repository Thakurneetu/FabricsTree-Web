<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\EnquiryItems;
use App\Models\Enquiry;
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
           if($val->enquery_type == 'custom')
           {
                $enquiry[$key]['enquiry_id'] = $val->id;
                $enquiry[$key]['customer_id'] = $val->customer_id;
                $enquiry[$key]['enquery_type'] = $val->enquery_type;
                $enquiry[$key]['status'] = $val->status;
                $enquiry[$key]['created_at'] = date('d M, Y H:i A',strtotime($val->created_at));
                
                $enquiry_items_data[0]['enquiry_item_id'] = 0;
                $enquiry_items_data[0]['product_id'] = 0;
                $enquiry_items_data[0]['enquery_id'] = 0;
                $enquiry_items_data[0]['quantity'] = '';
                $enquiry_items_data[0]['color_code'] = '';
                $enquiry_items_data[0]['created_at'] = date('d M, Y H:i A',strtotime($val->created_at));
                $enquiry_items_data[0]['title'] = 'Custom Product';
                $enquiry_items_data[0]['subtitle'] = '';
                $enquiry_items_data[0]['description'] = '';
                $enquiry_items_data[0]['key_features'] = '';
                $enquiry_items_data[0]['disclaimer'] = '';
                $enquiry_items_data[0]['category_id'] = $val->category_id;
                $enquiry_items_data[0]['subcategory_id'] = $val->subcategory_id;
                $enquiry_items_data[0]['requirement_id'] = '';
                $enquiry_items_data[0]['width'] = $val->width;
                $enquiry_items_data[0]['warp'] = $val->warp;
                $enquiry_items_data[0]['weft'] = $val->weft;
                $enquiry_items_data[0]['count'] = $val->count;
                $enquiry_items_data[0]['reed'] = $val->reed;
                $enquiry_items_data[0]['pick'] = $val->pick;
              
                $enquiry[$key]['enquiry_items'] = $enquiry_items_data;

           }
           else
           {

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

        $enquiry = Enquiry::find($id);
        $data['enquery_type'] = $enquiry->enquery_type;
        //dd( $enquiry);
        $enquiry_items_data = [];
        
        if($enquiry->enquery_type=='selected'){
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
        }
        
        //dd($enquiry_items_data);
        $data['enquiry_items'] = $enquiry_items_data;
       
        return view('product.quotesitems',$data);
    }


    public function requestQuotesRevoke(Request $request)
    {
      $data['invoke_reason'] =  $request->revoke_reason;
      $data['status'] = 'invoked';
      $data['revoked_at'] = now();
      Enquiry::where('id', $request->enquiry_id)->update($data);
      return response()->json([
        'status' => true,
        'message' => 'Quote revoked successfully.',
      ]);
    }

    
}
