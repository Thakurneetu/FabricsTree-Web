<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\ProductDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
      return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = Category::get();
      $subcategories = Subcategory::get();
      $requirements = Requirement::get();
      $tags = Tag::get();
      return view('admin.product.create', compact('categories','subcategories','requirements','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      try{
        DB::beginTransaction();
        $data = $request->only('title','subtitle','description','key_features','disclaimer',
              'category_id','requirement_id','subcategory_id','width','count','reed','pick');
        $product = Product::create($data);
        $tags = $request->tag_ids;
        $product->tags()->sync($tags);
        DB::commit();
        Alert::toast('Product Added Successfully','success');
        return redirect(route('admin.product.index'));
      }catch (\Throwable $th) {
        DB::rollback();
        Alert::error($th->getMessage());
        return redirect()->back();
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
      $categories = Category::get();
      $subcategories = Subcategory::get();
      $requirements = Requirement::get();
      $tags = Tag::get();
      return view('admin.product.edit', compact('categories','subcategories','requirements','tags','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
      try{
        DB::beginTransaction();
        $data = $request->only('title','subtitle','description','key_features','disclaimer',
              'category_id','requirement_id','subcategory_id','width','count','reed','pick');
        $product->update($data);
        $tags = $request->tag_ids;
        $product->tags()->sync($tags);
        DB::commit();
        Alert::toast('Product Updated Successfully','success');
        return redirect(route('admin.product.index'));
      }catch (\Throwable $th) {
        DB::rollback();
        Alert::error($th->getMessage());
        return redirect()->back();
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
      try{
        $product->delete();
        Alert::toast('Product Deleted Successfully','success');
        return redirect()->back();
      }catch (\Throwable $th) {
        Alert::error($th->getMessage());
        DB::rollback();
        return redirect()->back();
      }
    }
}
