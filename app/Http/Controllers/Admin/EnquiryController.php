<?php

namespace App\Http\Controllers\Admin;

use App\Models\Enquiry;
use App\Models\Customer;
use App\Models\ManufacturerEnquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\EnquiryDataTable;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EnquiryDataTable $dataTable)
    {
      return $dataTable->render('admin.enquiry.index');
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
          $data['qutation'] = $this->save_image($request->qutation, '/uploads/qutation');
          $data['status'] = 'invoiced';
          $enquiry->update($data);
          Alert::toast('Qutation Sent Successfully','success');
        }
        ManufacturerEnquiry::where('enquery_id', $enquiry->id)->whereNotIn('customer_id', $request->manufacturures)->delete();
        foreach ($request->manufacturures as $key => $customer_id) {
          $data = [
            'enquery_id' => $enquiry->id,
            'customer_id' => $customer_id,
          ];
          ManufacturerEnquiry::updateOrCreate($data);
        }
        DB::commit();
        return redirect(route('admin.enquiry.index'));
      }catch (\Throwable $th) {
        DB::rollback();
        dd($th);
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

    private function save_image($file, $store_path){
      $extension = File::extension($file->getClientOriginalName());
      $filename = rand(10,99).date('YmdHis').rand(10,99).'.'.$extension;
      $file->move(public_path($store_path), $filename);
      return $store_path.'/'.$filename;
    }
}
