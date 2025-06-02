<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\TestimonialDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TestimonialDataTable $dataTable)
    {
      return $dataTable->render('admin.testimonial.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      try{
        DB::beginTransaction();
        $data = $request->except('_token','image');
        if($request->hasFile('image')){
          $data['image'] = $this->saveImage($request->image, '/uploads/testimonials');
        }
        Testimonial::create($data);
        DB::commit();
        Alert::toast('Testimonial Added Successfully','success');
        return redirect(route('admin.testimonial.index'));
      }catch (\Throwable $th) {
        DB::rollback();
        Alert::error($th->getMessage());
        return redirect()->back();
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
      return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
      try{
        DB::beginTransaction();
        $data = $request->except('_token', '_method','image');
        if($request->hasFile('image')){
          $data['image'] = $this->saveImage($request->image, '/uploads/testimonials');
        }
        $testimonial->update($data);
        DB::commit();
        Alert::toast('Testimonial Update Successfully','success');
        return redirect(route('admin.testimonial.index'));
      }catch (\Throwable $th) {
        DB::rollback();
        Alert::error($th->getMessage());
        return redirect()->back();
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
      try{
        $testimonial->delete();
        Alert::toast('Testimonial Deleted Successfully','success');
        return redirect()->back();
      }catch (\Throwable $th) {
        Alert::error($th->getMessage());
        DB::rollback();
        return redirect()->back();
      }
    }

    private function saveImage($file, $store_path){
      $extension = File::extension($file->getClientOriginalName());
      $filename = random_int(10,99).date('YmdHis').random_int(10,99).'.'.$extension;
      $file->move(public_path($store_path), $filename);
      return $store_path.'/'.$filename;
    }
}
