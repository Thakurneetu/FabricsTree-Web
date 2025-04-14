<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\CustomersDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\CustomerStoreRequest;
use App\Http\Requests\Admin\CustomerUpdateRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CustomersDataTable $dataTable)
    {
      return $dataTable->render('admin.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
      try{
        DB::beginTransaction();
        $data = $request->except('_token');
        $data['user_type'] = 'Customer';
        Customer::create($data);
        DB::commit();
        Alert::toast('Customer Added Successfully','success');
        return redirect(route('admin.customer.index'));
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
    public function edit(Customer $customer)
    {
      return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
      try{
        if($request->ajax()){
          $status = $request->status == '1' ? 1 : 0;
          $customer->update(['status'=>$status]);
          return response()->json([
            'success' => true, 'message' => 'Status Updated Successfully!'
          ]);
        }
        DB::beginTransaction();
        $data = $request->except('_token', '_method', 'password');
        if($request->password) {
          $data['password'] = $request->password;
        }
        $customer->update($data);
        DB::commit();
        Alert::toast('Customer Update Successfully','success');
        return redirect(route('admin.customer.index'));
      }catch (\Throwable $th) {
        DB::rollback();
        Alert::error($th->getMessage());
        return redirect()->back();
      } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
      try{
        $customer->delete();
        Alert::toast('Customer Deleted Successfully','success');
        return redirect()->back();
      }catch (\Throwable $th) {
        Alert::error($th->getMessage());
        DB::rollback();
        return redirect()->back();
      }
    }
}
