<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\ContactUs;
use App\Http\Requests\API\ContactUsRequest;

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

    public function testimonials()
    {
      $testimonials = Testimonial::select('name', 'designation', 'comment', 'rating')->get();
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
