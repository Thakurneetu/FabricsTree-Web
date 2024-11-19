<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function categories()
    {
      $categories = Category::select('id', 'name')->get();
        return response()->json([
            'status' => true,
            'categories' => $categories,
        ]);
    }
}
