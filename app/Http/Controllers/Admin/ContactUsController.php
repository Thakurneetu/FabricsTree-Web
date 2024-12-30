<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\ContactUsDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ContactUsDataTable $dataTable)
    {
      return $dataTable->render('admin.contact_us.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show($id)
    {
      $contactUs = ContactUs::find($id);
      return view('admin.contact_us.show', compact('contactUs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      ContactUs::find($id)->update(['status'=>$request->status]);
      return response()->json(['success'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
