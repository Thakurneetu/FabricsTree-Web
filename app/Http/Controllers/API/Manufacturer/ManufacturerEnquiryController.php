<?php

namespace App\Http\Controllers\API\Manufacturer;

use App\Models\Enquiry;
use App\Models\User;
use App\Models\Customer;
use App\Models\Order;
use App\Models\ManufacturerEnquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\EnquiryDataTable;
use Illuminate\Support\Facades\DB;
use File;
use App\Mail\NewManufacturerQuote;
use Illuminate\Support\Facades\Mail;

class ManufacturerEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      if($request->has('status') && $request->status == 3){
        $ids = Order::where(['manufacturer_id'=>$request->user()->id, 'status'=>'Returned'])->pluck('enquiry_id')->toArray();
        $entries = ManufacturerEnquiry::whereIn('enquery_id', $ids)->where('customer_id', $request->user()->id)->latest()->paginate(10)->appends($request->all());
      }elseif($request->has('status') && $request->status == 2){
        $ids = Order::where('manufacturer_id',$request->user()->id)->whereIn('status',['Delivered','Revoked'])->pluck('enquiry_id')->toArray();
        $entries = ManufacturerEnquiry::whereIn('enquery_id', $ids)->where('customer_id', $request->user()->id)->latest()->paginate(10)->appends($request->all());
      }elseif($request->has('status') && $request->status == 1){
        $ids = Order::where(['manufacturer_id'=>$request->user()->id, 'status'=>'Dispatched'])->pluck('enquiry_id')->toArray();
        $entries = ManufacturerEnquiry::whereIn('enquery_id', $ids)->where('customer_id', $request->user()->id)->latest()->paginate(10)->appends($request->all());
      }else{
        $entries = ManufacturerEnquiry::where('customer_id', $request->user()->id)->latest()->paginate(10);
      }

      foreach ($entries as $entry) {
        $items_list = array();
        $entry->type = $entry->enquery->enquery_type;
        if($entry->enquery->enquery_type == 'selected') {
          foreach ($entry->enquery->items as $key => $item) {
            $items_list[$key]['quantity'] = $item->quantity;
            $items_list[$key]['color_code'] = $item->color_code;
            $items_list[$key]['title'] = $item->title;
            $items_list[$key]['subtitle'] = $item->subtitle;
            $items_list[$key]['category'] = $item->category->name;
            $items_list[$key]['subcategory'] = $item->subcategory->name;
            $items_list[$key]['requirement'] = $item->requirement->name??null;
            $items_list[$key]['width'] = $item->width;
            $items_list[$key]['warp'] = $item->warp;
            $items_list[$key]['weft'] = $item->weft;
            $items_list[$key]['count'] = $item->count;
            $items_list[$key]['reed'] = $item->reed;
            $items_list[$key]['pick'] = $item->pick;
            $items_list[$key]['image'] = $item->product->image_list;
          }
          $entry->items = $items_list;
        } else{
          $items_list[0]['quantity'] = null;
          $items_list[0]['color_code'] = $entry->enquery->color_code;
          $items_list[0]['title'] = $entry->enquery->title;
          $items_list[0]['subtitle'] = $entry->enquery->subtitle;
          $items_list[0]['category'] = $entry->enquery->category->name;
          $items_list[0]['subcategory'] = $entry->enquery->subcategory->name;
          $items_list[0]['requirement'] = $entry->enquery->requirement->name??null;
          $items_list[0]['width'] = $entry->enquery->width;
          $items_list[0]['warp'] = $entry->enquery->warp;
          $items_list[0]['weft'] = $entry->enquery->weft;
          $items_list[0]['count'] = $entry->enquery->count;
          $items_list[0]['reed'] = $entry->enquery->reed;
          $items_list[0]['pick'] = $entry->enquery->pick;
          $items_list[0]['image'] = [];
          $entry->items = $items_list;
        }
      }
      return response()->json([
        'status' => true,
        'enquiries' => $entries,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ManufacturerEnquiry $enquiry)
    {
      $entry = $enquiry;
      $entry->type = $entry->enquery->enquery_type;
      $order = Order::where(['manufacturer_id' => $enquiry->customer_id, 'enquiry_id'=>$enquiry->enquery_id])->first();
      if($entry->qutation == ''){
        $entry->status = 'Pending';
      }elseif($entry->qutation != '' && !$order){
        $entry->status = 'Quotation Sent';
      }elseif($order){
        if($order->status == 'Pending'){
        $entry->status = 'Accepted';
        }elseif($order->status == 'Dispatched'){
          $entry->status = 'On the way';
        }elseif($order->status == 'Delivered'){
          $entry->status = 'Delivered';
        }elseif($order->status == 'Returned'){
          $entry->status = 'Returned';
        }elseif($order->status == 'Revoked'){
          $entry->status = 'Cancelled';
        }else{
          $entry->status = $order->status;
        }
      }elseif($entry->enquery->status == 'invoked'){
        $entry->status = 'Cancelled';
      }
      $quote = Enquiry::select('id','enquery_type','status','invoke_reason','qutation','revoked_at')
                        ->with('items:id,enquery_id,product_id,color_code,quantity,title,category_id,subcategory_id,requirement_id,width,warp,weft,count,reed,pick',
                        'items.category:id,name',
                        'items.subcategory:id,name',
                        'items.product:id')
                        ->find($entry->enquery_id);
      $quote->qutation = $quote->qutation != '' ? asset($quote->qutation) : null;
      $entry->quote = $quote;
      return response()->json([
        'status' => true,
        'enquiry' => $entry,$order
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ManufacturerEnquiry $enquiry)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ManufacturerEnquiry $enquiry)
    {
      try{
        DB::beginTransaction();
        if($request->hasFile('qutation')){
          $data['qutation'] = $this->saveImage($request->qutation, '/uploads/qutation');
          $enquiry->update($data);
          $mail_data['user'] = $enquiry->customer;
          $mail_data['quotation'] = asset($enquiry->qutation);
          $admin = User::first();
          Mail::to($admin->email)->send(new NewManufacturerQuote($mail_data));
        }
        DB::commit();
        return response()->json([
          'status' => true,
          'message' => 'Quotation uploaded successfully',
        ]);
      }catch (\Throwable $th) {
        DB::rollback();
        return response()->json([
          'status' => true,
          'error' => $th->getMessage(),
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enquiry $enquiry)
    {
        //
    }

    private function saveImage($file, $store_path){
      $extension = File::extension($file->getClientOriginalName());
      $filename = random_int(10,99).date('YmdHis').random_int(10,99).'.'.$extension;
      $file->move(public_path($store_path), $filename);
      return $store_path.'/'.$filename;
    }
}
