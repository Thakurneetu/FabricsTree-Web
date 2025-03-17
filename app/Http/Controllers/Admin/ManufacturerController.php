<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\ManufacturerDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ManufacturerDataTable $dataTable)
    {
      return $dataTable->render('admin.manufacturer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('admin.manufacturer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      try{
        DB::beginTransaction();
        $data = $request->except('_token');
        $data['user_type'] = 'Manufacturer';
        Customer::create($data);
        DB::commit();
        Alert::toast('Manufacturer Added Successfully','success');
        return redirect(route('admin.manufacturer.index'));
      }catch (\Throwable $th) {
        DB::rollback();
        Alert::error($th->getMessage());
        return redirect()->back();
      } 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $manufacturer)
    {
      return view('admin.manufacturer.edit', compact('manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $manufacturer)
    {
      try{
        DB::beginTransaction();
        $data = $request->except('_token', '_method', 'password');
        if($request->password)
        $data['password'] = $request->password;
        $manufacturer->update($data);
        DB::commit();
        Alert::toast('Manufacturer Update Successfully','success');
        return redirect(route('admin.manufacturer.index'));
      }catch (\Throwable $th) {
        DB::rollback();
        Alert::error($th->getMessage());
        return redirect()->back();
      } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $manufacturer)
    {
      try{
        $manufacturer->delete();
        Alert::toast('Manufacturer Deleted Successfully','success');
        return redirect()->back();
      }catch (\Throwable $th) {
        Alert::error($th->getMessage());
        DB::rollback();
        return redirect()->back();
      }
    }
}
