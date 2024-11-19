<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
      return $dataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      try{
        DB::beginTransaction();
        $data = $request->only('name');
        Category::create($data);
        DB::commit();
        Alert::toast('Category Added Successfully','success');
        return redirect(route('admin.category.index'));
      }catch (\Throwable $th) {
        DB::rollback();
        Alert::error($th->getMessage());
        return redirect()->back();
      } 
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
      return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
      try{
        DB::beginTransaction();
        $data = $request->only('name');
        $category->update($data);
        DB::commit();
        Alert::toast('Category Update Successfully','success');
        return redirect(route('admin.category.index'));
      }catch (\Throwable $th) {
        DB::rollback();
        Alert::error($th->getMessage());
        return redirect()->back();
      } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
      try{
        $category->delete();
        Alert::toast('Category Deleted Successfully','success');
        return redirect()->back();
      }catch (\Throwable $th) {
        Alert::error($th->getMessage());
        DB::rollback();
        return redirect()->back();
      }
    }
}
