<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Requirement;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\ProductColors;
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
        if($request->has('images')){
          $image['product_id'] = $product->id;
          foreach ($request->images as $image_file) {
            $image['path'] = $this->save_image($image_file, '/uploads/product/image');
            ProductImage::create($image);
          }
        }
        $color['product_id'] = $product->id;
        foreach ($request->colors as $value) {
          $color['code'] = $value;
          ProductColors::updateOrCreate($color, $color);
        }
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
        if($request->has('images')){
          $image['product_id'] = $product->id;
          foreach ($request->images as $image_file) {
            $image['path'] = $this->save_image($image_file, '/uploads/product/image');
            ProductImage::create($image);
          }
        }
        ProductColors::where('product_id', $product->id)->whereNotIn('code', $request->colors)->delete();
        $color['product_id'] = $product->id;
        foreach ($request->colors as $value) {
          $color['code'] = $value;
          ProductColors::updateOrCreate($color, $color);
        }
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
        DB::beginTransaction();
        $product->delete();
        DB::commit();
        Alert::toast('Product Deleted Successfully','success');
        return redirect()->back();
      }catch (\Throwable $th) {
        Alert::error($th->getMessage());
        DB::rollback();
        return redirect()->back();
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteImage(Request $request)
    {
      try{
        DB::beginTransaction();
        $image = ProductImage::find($request->id);
        if (file_exists(public_path($image->path))) {
          unlink(public_path($image->path));
        }
        $image->delete();
        DB::commit();
        return response()->json([
          'success' => true,
          'message' => 'Image Deleted Successfully',
        ]);
      }catch (\Throwable $th) {
        DB::rollback();
        return response()->json([
          'success' => false,
          'message' => $th->getMessage(),
        ]);
      }
    }

    private function save_image($file, $store_path){
      $extension = File::extension($file->getClientOriginalName());
      $filename = rand(10,99).date('YmdHis').rand(10,99).'.'.$extension;
      $file->move(public_path($store_path), $filename);
      return $store_path.'/'.$filename;
    }
}
