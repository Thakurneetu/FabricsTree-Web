<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\ManufacturerProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\ManufacturerDataTable;
use App\DataTables\ManufacturerProductDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\ManufacturerStoreRequest;
use App\Http\Requests\Admin\ManufacturerUpdateRequest;

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
    public function store(ManufacturerStoreRequest $request)
    {
      try{
        DB::beginTransaction();
        $data = $request->except('_token');
        $data['user_type'] = 'Manufacturer';

        if ($request->hasFile('store_logo')) {
          $image = $request->file('store_logo');
          $imageName = time().'_'.$image->getClientOriginalName();
          $image->move(public_path('uploads/logo'), $imageName);
          $store_logo = 'uploads/logo/' . $imageName;
          $data['store_logo'] = $store_logo;
        }
        
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
    public function show(Customer $manufacturer, ManufacturerProductDataTable $dataTable)
    {
      return $dataTable->with('id', $manufacturer->id)->render('admin.manufacturer.show', compact('manufacturer'));
      // return view('admin.manufacturer.show', compact('manufacturer'));
    }
    /**
     * Display the specified resource.
     */
    public function product($id)
    {
      $product = ManufacturerProduct::find($id);
      return view('admin.manufacturer.product', compact('product'));
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
    public function update(ManufacturerUpdateRequest $request, Customer $manufacturer)
    {
      try{
        if($request->ajax()){
          $status = $request->status == '1' ? 1 : 0;
          $manufacturer->update(['status'=>$status]);
          return response()->json([
            'success' => true, 'message' => 'Status Updated Successfully!'
          ]);
        }
        DB::beginTransaction();
        $data = $request->except('_token', '_method', 'password');
        if($request->password)
        $data['password'] = $request->password;
        
        if ($request->hasFile('store_logo')) {
          $image = $request->file('store_logo');
          $imageName = time().'_'.$image->getClientOriginalName();
          $image->move(public_path('uploads/logo'), $imageName);
          $store_logo = 'uploads/logo/' . $imageName;
          $data['store_logo'] = $store_logo;
        }

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
