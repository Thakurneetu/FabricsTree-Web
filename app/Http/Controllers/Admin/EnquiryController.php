<?php

namespace App\Http\Controllers\Admin;

use App\Models\Enquiry;
use App\Models\Customer;
use App\Models\Notification;
use App\Models\ManufacturerEnquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\EnquiryDataTable;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;
use App\Mail\NewManufacturerEnquiry;
use App\Mail\NewEnquiryQuote;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EnquiryDataTable $dataTable)
    {
      return $dataTable->with('type', 'selected')->render('admin.enquiry.index');
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
    public function show(Enquiry $enquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enquiry $enquiry)
    {
      $manufacturers = Customer::where('user_type', 'Manufacturer')->where('status','1')->get();
      return view('admin.enquiry.edit', compact('enquiry','manufacturers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enquiry $enquiry)
    {
      try{
        DB::beginTransaction();
        if($request->hasFile('qutation')){
          $data['qutation'] = $this->saveImage($request->qutation, '/uploads/qutation');
          $data['status'] = 'invoiced';
          $enquiry->update($data);
          Notification::create([
            'data' => [
                'enquiry_id' => $enquiry->id,
            ],
            'type' => 'quote',
            'customer_id' => $enquiry->customer->id,
            'message' => 'Quotation received for your enquiry.',
            'is_read' => false,
          ]);
          $mail_data['user'] = $enquiry->customer;
          $mail_data['quotation'] = public_path($data['qutation']);
          Mail::to($enquiry->customer->email)->send(new NewEnquiryQuote($mail_data));
          Alert::toast('Qutation Sent Successfully','success');
        }
        if($request->has('manufacturures')){
          $mail_data['enquiry'] = $enquiry;
          $mail_data['items'] = $enquiry->items;
          $manufacturers_ids = ManufacturerEnquiry::where('enquery_id', $enquiry->id)->pluck('customer_id')->toArray();
          ManufacturerEnquiry::where('enquery_id', $enquiry->id)->whereNotIn('customer_id', $request->manufacturures)->delete();
          foreach ($request->manufacturures as $customer_id) {
            $data = [
              'enquery_id' => $enquiry->id,
              'customer_id' => $customer_id,
            ];
            ManufacturerEnquiry::updateOrCreate($data);
            if(!in_array($customer_id, $manufacturers_ids)) {
              $mail_data['user'] = Customer::find($customer_id);
              Mail::to($mail_data['user']->email)->send(new NewManufacturerEnquiry($mail_data));
              Notification::create([
                'data' => [
                    'enquiry_id' => $enquiry->id,
                ],
                'type' => 'quote',
                'customer_id' => $customer_id,
                'message' => 'New enquiry has recieved.',
                'is_read' => false,
              ]);
            }
          }
          Alert::toast('Requirement Sent Successfully','success');
        }elseif($request->has('manufacturur_assign') && $request->manufacturur_assign == 1){
          ManufacturerEnquiry::where('enquery_id', $enquiry->id)->delete();
        }
        if($request->has('manufacturer_id')){
          $data['manufacturer_id'] = $request->manufacturer_id;
          $enquiry->update($data);
          Alert::toast('Qutation Selected For This Enquiry Successfully','success');
        }
        DB::commit();
        return redirect(route('admin.enquiry.index'));
      }catch (\Throwable $th) {
        DB::rollback();
        Alert::error($th->getMessage());
        return redirect()->back();
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
      $filename = rand(10,99).date('YmdHis').rand(10,99).'.'.$extension;
      $file->move(public_path($store_path), $filename);
      return $store_path.'/'.$filename;
    }
}
