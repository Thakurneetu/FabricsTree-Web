<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Enquiry;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Testimonial;
use App\Models\ContactUs;
use App\Http\Requests\API\ContactUsRequest;

class HomeController extends Controller
{
    public function dashboard(Request $request)
    {
      $quotes = Enquiry::where('customer_id', $request->user()->id)->count();
      $orders = Order::where('customer_id', $request->user()->id)->count();
        return response()->json([
            'status' => true,
            'quotes' => $quotes,
            'orders' => $orders,
        ]);
    }

    public function categories()
    {
      $categories = Category::select('id', 'name', 'image')->get();
        return response()->json([
            'status' => true,
            'categories' => $categories,
        ]);
    }

    public function subcategories($id)
    {
      $subcategories = Subcategory::select('id', 'name')->where('category_id', $id)->get();
        return response()->json([
            'status' => true,
            'subcategories' => $subcategories,
        ]);
    }

    public function testimonials()
    {
      $testimonials = Testimonial::select('name', 'designation', 'comment', 'rating', 'image')->get();
      foreach($testimonials as $testimonial)
      $testimonial->image = url('/').$testimonial->image;
        return response()->json([
            'status' => true,
            'testimonials' => $testimonials,
        ]);
    }

    public function saveContactUs(ContactUsRequest $request)
    {
      $data = $request->only('name','email','phone','message');
      $data['status'] = 'pending';
      ContactUs::create($data);
        return response()->json([
            'status' => true,
            'message' => 'Message received successfully.',
        ]);
    }
}
