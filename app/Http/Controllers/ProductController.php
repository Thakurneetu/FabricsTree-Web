<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('product.index');
    }

    public function list()
    {
        return view('product.lists');
    }

    public function category()
    {
        return view('product.category');
    }
}
