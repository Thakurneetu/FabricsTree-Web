<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Requirement;
use App\Models\Subcategory;

class ProductsController extends Controller
{
    public function products(Request $request)
    {
      $categoryId = $request->input('category_id');
      $requirementId = $request->input('requirement_id');
      $subcategoryId = $request->input('subcategory_id');
      $width = $request->input('width');
      $count = $request->input('count');
      $reed = $request->input('reed');
      $pick = $request->input('pick');

      $query = Product::select('id','title','subtitle','description','key_features','disclaimer','category_id','requirement_id','subcategory_id','width','count','reed','pick');
      
      if ($categoryId)
        $query->where('category_id', $categoryId);
      if ($requirementId)
        $query->where('requirement_id', $requirementId);
      if ($subcategoryId)
        $query->where('subcategory_id', $subcategoryId);
      if ($width)
        $query->where('width', $width);
      if ($count)
        $query->where('count', $count);
      if ($reed)
        $query->where('reed', $reed);
      if ($pick)
        $query->where('pick', $pick);

      $products = $query->paginate(); 
      
      return response()->json([
          'status' => true,
          'products' => $products,
      ]);
    }
    public function filters(Request $request)
    {
      $categories = Category::select('id','name')->get();
      $requirements = Requirement::select('id','name')->get();
      $subcategories = Subcategory::select('id','name')->get();
      $widths = Product::pluck('width')->unique()->values()->toArray();
      $count = Product::pluck('count')->unique()->values()->toArray();
      $reed = Product::pluck('reed')->unique()->values()->toArray();
      $pick = Product::pluck('pick')->unique()->values()->toArray();
      return response()->json([
          'status' => true,
          'categories' => $categories,
          'requirements' => $requirements,
          'subcategories' => $subcategories,
          'widths' => $widths,
          'count' => $count,
          'reed' => $reed,
          'pick' => $pick,
      ]);
    }
}
