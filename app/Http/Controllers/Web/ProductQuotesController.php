<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\EnquiryItems;
use App\Models\Enquiry;
use App\Models\ManufacturerEnquiry;
use File;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProductQuotesController extends Controller
{
    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index(Request $request)
    // {
    //     // echo "<li>". $appTimezone = date_default_timezone_get();
    //     // echo "<li>".  $now = Carbon::now();
    //     // echo "<li>".  $appTimezone = $now->timezone;
    //     // die;
    //     $id = Auth::guard('customer')->id();
    //     $customer = Customer::find($id);
    //     $data['customer'] = $customer;
    //     return view('product.productquotes',$data);
    // }

    public function index(Request $request)
    {
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;
        if(@$customer->user_type==''){
            return redirect('/')->withError('Session Expired');
        }
        
        //dd($enquiries);
        if($customer->user_type=='Customer')
        {
            $query = Enquiry::where('enquery_type', 'selected')->where('customer_id', $id);
            if($request->status!='all' && $request->status!=""){
                $filters = explode(',',$request->input('status'));
                $query->whereIn('status',$filters);
            }else{
                $filters = explode(',',$request->input('status'));
                $query->whereNotIn('status',$filters);
            }
            $enquiries = $query->latest()->get();
            $enquiry = [];
            $enquiry_items_data = [];
            foreach ($enquiries as $key => $val)
            {
                if($val->enquery_type == 'custom')
                {
                    $enquiry[$key]['enquiry_id'] = $val->id;
                    $enquiry[$key]['customer_id'] = $val->customer_id;
                    $enquiry[$key]['enquery_type'] = $val->enquery_type;
                    $enquiry[$key]['status'] = $val->status;
                    $enquiry[$key]['qutation'] = $val->qutation;
                    $enquiry[$key]['created_at'] = date('d M, Y h:i A',strtotime($val->created_at));
                    
                    $enquiry_items_data[0]['enquiry_item_id'] = 0;
                    $enquiry_items_data[0]['product_id'] = 0;
                    $enquiry_items_data[0]['enquery_id'] = 0;
                    $enquiry_items_data[0]['quantity'] = '';
                    $enquiry_items_data[0]['color_code'] = '';
                    $enquiry_items_data[0]['created_at'] = date('d M, Y h:i A',strtotime($val->created_at));
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
                    $enquiry[$key]['qutation'] = $val->qutation;
                    $enquiry[$key]['created_at'] = date('d M, Y h:i A',strtotime($val->created_at));
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
                            $enquiry_items_data[$k]['category_name'] = $v->category->name;
                            $enquiry_items_data[$k]['subcategory_name'] = $v->subcategory->name;
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
        }
        else
        {
            if($request->status!='all' && $request->status!=""){
                 $filters = explode(',',$request->input('status'));

                $manufacturer_enquiry = ManufacturerEnquiry::select('enquiries.*','manufacturer_enquiries.created_at as created_at','manufacturer_enquiries.qutation as qutation')
                ->join('enquiries', 'enquiries.id','manufacturer_enquiries.enquery_id')
                ->where('manufacturer_enquiries.customer_id',$id)
                ->whereIn('enquiries.status',$filters)
                ->orderBy('manufacturer_enquiries.id','DESC')
                ->get();

            }else{

                $filters = explode(',',$request->input('status'));
                $manufacturer_enquiry = ManufacturerEnquiry::select('enquiries.*','manufacturer_enquiries.created_at as created_at','manufacturer_enquiries.qutation as qutation')
                ->join('enquiries', 'enquiries.id','manufacturer_enquiries.enquery_id')
                ->where('manufacturer_enquiries.customer_id',$id)
                ->whereNotIn('enquiries.status',$filters)
                ->orderBy('manufacturer_enquiries.id','DESC')
                ->get();
            }

            //dd($manufacturer_enquiry);
            $enquiry = [];
            $enquiry_items_data = [];
            foreach ($manufacturer_enquiry as $key => $val) {
                /// dd($enquiry->id);
                if($val->enquery_type == 'custom')
                {
                        $enquiry[$key]['enquiry_id'] = $val->id;
                        $enquiry[$key]['customer_id'] = $val->customer_id;
                        $enquiry[$key]['enquery_type'] = $val->enquery_type;
                        $enquiry[$key]['status'] = $val->status;
                        $enquiry[$key]['qutation'] = $val->qutation;
                        $enquiry[$key]['created_at'] = date('d M, Y h:i A',strtotime($val->created_at));
                        
                        $enquiry_items_data[0]['enquiry_item_id'] = 0;
                        $enquiry_items_data[0]['product_id'] = 0;
                        $enquiry_items_data[0]['enquery_id'] = 0;
                        $enquiry_items_data[0]['quantity'] = '';
                        $enquiry_items_data[0]['color_code'] = '';
                        $enquiry_items_data[0]['created_at'] = date('d M, Y h:i A',strtotime($val->created_at));
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
                    $enquiry[$key]['qutation'] = $val->qutation;
                    $enquiry[$key]['created_at'] = date('d M, Y h:i A',strtotime($val->created_at));
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
                            $enquiry_items_data[$k]['category_name'] = $v->category->name;
                            $enquiry_items_data[$k]['subcategory_name'] = $v->subcategory->name;
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
        }

        // After you've built your $enquiry array
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 50;
        $enquiryCollection = collect($enquiry); // convert array to Collection
        $currentItems = $enquiryCollection->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginatedEnquiries = new LengthAwarePaginator(
            $currentItems,
            $enquiryCollection->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $data['request_quote'] = $paginatedEnquiries;
        
        //$data['request_quote'] = $enquiry;

        if($request->status)
        {
            $dataHtml  = view('product.quotesData',$data)->render();

            return response()->json([
            'status' => true,
            'message' => 'Get successfully.',
            'data'=>$dataHtml
            ]);

        }else{

            return view('product.productquotes',$data);
        }
    }

    public function quotesitems($id)
    {
        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);
        $data['customer'] = $customer;
        if(@$customer->user_type==''){
            return redirect('/')->withError('Session Expired');
        }
        //dd($customer->enquiry);

        $enquiry = Enquiry::find($id);
        $data['enquiry'] = $enquiry;
        $data['enquery_type'] = $enquiry->enquery_type;
        //dd( $enquiry);
        $enquiry_items_data = [];
        $enquiry_data = '';
        if($enquiry->enquery_type=='selected'){

            if($customer->user_type=='Manufacturer'){
                $enquiry_data = ManufacturerEnquiry::select('enquiries.*','manufacturer_enquiries.created_at as created_at','manufacturer_enquiries.qutation as manufacturer_qutation')
                ->join('enquiries', 'enquiries.id','manufacturer_enquiries.enquery_id')
                ->where('manufacturer_enquiries.enquery_id',$id)
                ->where('manufacturer_enquiries.customer_id',$customer_id)
                ->get();
            }else{
                $enquiry_data = $enquiry;
            }
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
                $enquiry_items_data[$k]['category_name'] = $v->category->name;
                $enquiry_items_data[$k]['subcategory_name'] = $v->subcategory->name;
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
        $data['enquiry_data'] = $enquiry_data;
        //dd( $data['enquiry_data'] );
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

    public function uploadquotes(Request $request)
    {
        //dd($request);
        $manufacturer_id = Auth::guard('customer')->id();
        //$customer = Customer::find($manufacturer_id);
        //$data['customer'] = $customer;
        if($request->hasFile('upload_quatation')){

            $data['qutation'] = $this->saveImage($request->upload_quatation, '/uploads/qutation');

            ManufacturerEnquiry::where(['enquery_id'=>$request->upload_enquiry_id,'customer_id'=>$manufacturer_id])->update($data);
           
            return redirect('productquotes')->with('success', 'Qutation Uploaded Successfully');
        }
    }

    private function saveImage($file, $store_path){
        $extension = File::extension($file->getClientOriginalName());
        $filename = random_int(10,99).date('YmdHis').random_int(10,99).'.'.$extension;
        $file->move(public_path($store_path), $filename);
        return $store_path.'/'.$filename;
    }

    public function acceptquotes(Request $request)
    {
      $id  = $request->enquiryid;
      $enquiry = Enquiry::find($id);
      $order_data['customer_id'] = $request->user()->id;
      $order_data['invoice_no'] = Str::upper(Str::random(10));
      $order_data['status'] = 'Pending';
      $order_data['enquiry_id'] = $enquiry->id;
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
        foreach ($enquiry->items as $item_data) {
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

    
}
