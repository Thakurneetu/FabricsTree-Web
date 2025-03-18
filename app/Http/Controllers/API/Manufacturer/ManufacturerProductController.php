<?php

namespace App\Http\Controllers\API\Manufacturer;

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
      $products = ManufacturerProduct::select('id','category_id','requirement_id','subcategory_id','width','count','reed','pick','wrap','weft')->with('category:id,name','subcategory:id,name')->where('customer_id', $request->user()->id)->get();
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
