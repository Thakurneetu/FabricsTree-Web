<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['products'] = Product::all();//with(['employees', 'jobApply.job:id,title']);
        $data['testimonials'] = Testimonial::all();

        return view('index',$data);
    }

    
}
