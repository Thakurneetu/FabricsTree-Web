<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\RequirementDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\RequirementStoreRequest;
use App\Http\Requests\Admin\RequirementUpdateRequest;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RequirementDataTable $dataTable)
    {
      return $dataTable->render('admin.requirement.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = Category::get();
      return view('admin.requirement.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequirementStoreRequest $request)
    {
      try{
        DB::beginTransaction();
        $data = $request->except('_token');
        Requirement::create($data);
        DB::commit();
        Alert::toast('Requirement Added Successfully','success');
        return redirect(route('admin.requirement.index'));
      }catch (\Throwable $th) {
        DB::rollback();
        Alert::error($th->getMessage());
        return redirect()->back();
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(Requirement $requirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Requirement $requirement)
    {
      $categories = Category::get();
      return view('admin.requirement.edit', compact('categories','requirement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequirementUpdateRequest $request, Requirement $requirement)
    {
      try{
        DB::beginTransaction();
        $data = $request->except('_token', '_method');
        $requirement->update($data);
        DB::commit();
        Alert::toast('Requirement Update Successfully','success');
        return redirect(route('admin.requirement.index'));
      }catch (\Throwable $th) {
        DB::rollback();
        Alert::error($th->getMessage());
        return redirect()->back();
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requirement $requirement)
    {
      try{
        $requirement->delete();
        Alert::toast('Requirement Deleted Successfully','success');
        return redirect()->back();
      }catch (\Throwable $th) {
        Alert::error($th->getMessage());
        DB::rollback();
        return redirect()->back();
      }
    }
}
