<?php

namespace App\Http\Controllers\API\Manufacturer;

use App\Models\Product;
use App\Models\ManufacturerProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManufacturerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      $products = ManufacturerProduct::select('id','category_id','requirement_id','subcategory_id','width','count','reed','pick','wrap','weft')
                                       ->with('category:id,name','subcategory:id,name')
                                       ->where('customer_id', $request->user()->id)
                                       ->latest()
                                       ->get();
      return response()->json([
        'status' => true,
        'products' => $products,
      ]);
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
      if($request->has('product_id') && $request->product_id != '') {
        $product = Product::find($request->product_id);
          ManufacturerProduct::updateOrCreate([
            'product_id'=>$request->product_id,
            'customer_id'=>$request->user()->id,
           ],[
              'product_id'=>$request->product_id,
              'customer_id'=>$request->user()->id,
              'title'=> $product->title,
              'subtitle'=> $product->subtitle,
              'color_code'=> $product->color_code,
              'width'=> $product->width,
              'pick'=> $product->pick,
              'count'=> $product->count,
              'reed'=> $product->reed,
              'description'=> $product->description,
              'key_features'=> $product->key_features,
              'disclaimer'=> $product->disclaimer,
              'category_id'=> $product->category_id,
              'requirement_id'=> $product->requirement_id,
              'subcategory_id'=> $product->subcategory_id,
              'wrap'=>$product->wrap,
              'weft'=> $product->weft
           ]);
          return response()->json([
          'status' => true,
          'message' => 'Product added successfully.',
          ]);
      }
      $data = $request->all();
      $data['customer_id'] =  $request->user()->id;
      ManufacturerProduct::create($data);
      return response()->json([
        'status' => true,
        'message' => 'Product added successfully.',
      ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ManufacturerProduct $manufacturerProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ManufacturerProduct $manufacturerProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $data = $request->all();
      ManufacturerProduct::find($id)->update($data);
      return response()->json([
        'status' => true,
        'message' => 'Product updated successfully.',
      ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      ManufacturerProduct::find($id)->delete();
      return response()->json([
        'status' => true,
        'message' => 'Product deleted successfully.',
      ]);
    }
}
