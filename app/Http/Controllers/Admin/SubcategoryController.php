<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\SubcategoryDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\SubcategoryStoreRequest;
use App\Http\Requests\Admin\SubcategoryUpdateRequest;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubcategoryDataTable $dataTable)
    {
      return $dataTable->render('admin.subcategory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = Category::get();
      return view('admin.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubcategoryStoreRequest $request)
    {
      try{
        DB::beginTransaction();
        $data = $request->except('_token');
        Subcategory::create($data);
        DB::commit();
        Alert::toast('Subcategory Added Successfully','success');
        return redirect(route('admin.subcategory.index'));
      }catch (\Throwable $th) {
        DB::rollback();
        Alert::error($th->getMessage());
        return redirect()->back();
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
      $categories = Category::get();
      return view('admin.subcategory.edit', compact('categories','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubcategoryUpdateRequest $request, Subcategory $subcategory)
    {
      try{
        DB::beginTransaction();
        $data = $request->except('_token', '_method');
        $subcategory->update($data);
        DB::commit();
        Alert::toast('Subcategory Update Successfully','success');
        return redirect(route('admin.subcategory.index'));
      }catch (\Throwable $th) {
        DB::rollback();
        Alert::error($th->getMessage());
        return redirect()->back();
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
      try{
        $subcategory->delete();
        Alert::toast('Subcategory Deleted Successfully','success');
        return redirect()->back();
      }catch (\Throwable $th) {
        Alert::error($th->getMessage());
        DB::rollback();
        return redirect()->back();
      }
    }
}
