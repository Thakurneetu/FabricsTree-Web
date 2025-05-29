<?php

namespace App\Http\Controllers\Admin;

use App\Models\Enquiry;
use App\Models\Customer;
use App\Models\ManufacturerEnquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CustomEnquiryDataTable;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class CustomEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CustomEnquiryDataTable $dataTable)
    {
      return $dataTable->with('type', 'custom')->render('admin.custom_enquiry.index');
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
    public function edit($id)
    {
      $enquiry = Enquiry::find($id);
      return view('admin.custom_enquiry.edit', compact('enquiry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      try{
        DB::beginTransaction();
          $data['status'] = 'accepted';
          Enquiry::find($id)->update($data);
          Alert::toast('Enquiry Marked as Reviewed Successfully','success');
        DB::commit();
        return redirect(route('admin.custom-enquiry.index'));
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
}
