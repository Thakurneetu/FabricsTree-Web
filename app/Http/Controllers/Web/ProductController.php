<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Requirement;
use App\Models\Tag;
use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['products'] = Product::all();
        $data['categories'] = Category::get();
        $data['subcategories'] = Subcategory::get();
        $data['requirements'] = Requirement::get();
        $data['widths'] = Product::pluck('width')->unique()->toArray();
        $data['wraps'] = Product::pluck('wrap')->unique()->toArray();
        $data['wefts'] = Product::pluck('weft')->unique()->toArray();
        $data['counts'] = Product::pluck('count')->unique()->toArray();
        $data['reeds'] = Product::pluck('reed')->unique()->toArray();
        $data['picks'] = Product::pluck('pick')->unique()->toArray();
        $data['tags'] = Tag::get();
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;
        return view('product.index',$data);
    }

    public function filter(Request $request)
    {
        $data['products'] = Product::all();
        $data['categories'] = Category::get();
        $data['subcategories'] = Subcategory::get();
        $data['requirements'] = Requirement::get();
        $data['widths'] = Product::pluck('width')->unique()->toArray();
        $data['wraps'] = Product::pluck('wrap')->unique()->toArray();
        $data['wefts'] = Product::pluck('weft')->unique()->toArray();
        $data['counts'] = Product::pluck('count')->unique()->toArray();
        $data['reeds'] = Product::pluck('reed')->unique()->toArray();
        $data['picks'] = Product::pluck('pick')->unique()->toArray();
        $data['tags'] = Tag::get();
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;

        if($request){
            $categoryId = $request->input('category_id');
            $requirementId = $request->input('requirement_id');
            $subcategoryId = $request->input('subcategory_id');
            $width = $request->input('width');
            $count = $request->input('count');
            $reed = $request->input('reed');
            $pick = $request->input('pick');

            $query = Product::select('id','title','subtitle','description','key_features','disclaimer',
                                        'category_id','requirement_id','subcategory_id','width','count',
                                        'reed','pick');
            
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
            $data['products'] = $products;
        }
        return view('product.index',$data);
    }

    public function productdetail($id)
    {
        $data['products_data'] = Product::find($id);
        $data['products'] = Product::all();
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;
        return view('product.productdetail',$data);
    }

    public function productcart()
    {
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;
        return view('product.productcart',$data);
    }
}
