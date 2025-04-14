<?php

namespace App\Http\Controllers\API\Manufacturer;

use App\Models\Enquiry;
use App\Models\Customer;
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
      $entries = ManufacturerEnquiry::where('customer_id', $request->user()->id)->latest()->paginate(10);
      foreach ($entries as $_key => $entry) {
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
            $items_list[$key]['requirement'] = $item->requirement->name;
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
          $items_list[$key]['requirement'] = $item->requirement->name;
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
      return response()->json([
        'status' => true,
        'enquiry' => $entry,
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
          $data['qutation'] = $this->save_image($request->qutation, '/uploads/qutation');
          $enquiry->update($data);
          $mail_data['user'] = $enquiry->customer;
          $mail_data['qutation'] = asset($enquiry->qutation);
          Mail::to()->send(new NewManufacturerQuote($data));
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

    private function save_image($file, $store_path){
      $extension = File::extension($file->getClientOriginalName());
      $filename = rand(10,99).date('YmdHis').rand(10,99).'.'.$extension;
      $file->move(public_path($store_path), $filename);
      return $store_path.'/'.$filename;
    }
}
