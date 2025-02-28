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
        $data['products'] = Product::select("*")->inRandomOrder()->get();
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
        //$data['products'] = Product::all();
        // $data['categories'] = Category::get();
        // $data['subcategories'] = Subcategory::get();
        // $data['requirements'] = Requirement::get();
        // $data['widths'] = Product::pluck('width')->unique()->toArray();
        // $data['wraps'] = Product::pluck('wrap')->unique()->toArray();
        // $data['wefts'] = Product::pluck('weft')->unique()->toArray();
        // $data['counts'] = Product::pluck('count')->unique()->toArray();
        // $data['reeds'] = Product::pluck('reed')->unique()->toArray();
        // $data['picks'] = Product::pluck('pick')->unique()->toArray();
        // $data['tags'] = Tag::get();
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
            //dd($products);
            //$data['products'] = $products;
        }
        $html = '<div class="card-group">';
        $i=1;
        foreach($products as $products_val){
        $html .= '<div class="card m-3">';
            if(isset($products_val) && count($products_val->images) > 0){
            $html .= '<a href="'.route('product.productdetail').'/'.$products_val->id.'"><img class="card-img-top" src="'.asset($products_val->images[0]->path).'" alt="Card image cap"></a>';
            }
            $html .= '<div class="card-body">
            <h5 class="card-titles"><a href="'.route('product.productdetail').'/'.$products_val->id.'">'.$products_val->title.'</a></h5>
            <div class="reviews">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <button class="btn-outline-success add_to_cart KnowMore" productid="'.$products_val->id.'" type="submit">Add to Cart</button>
            </div>';
            $html .= '</div>';
            if($i==4){
                $html .= '</div><div class="card-group" >';
                $i = 0;
            }
          $i++;
        }
        $html .= '</div>';
        return response()->json([
            'status' => true,
            'message' => 'Your account has been created successfully.',
            'data' => $html,
        ], 200);

        //return view('product.product_grid_view',$data)->render();
    }

    public function productdetail($id)
    {
        $data['products_data'] = Product::find($id);
        $data['products'] = Product::select("*")->inRandomOrder()->get();
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;
        return view('product.productdetail',$data);
    }

    public function productcart(Request $request)
    {
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;
        //dd($customer->carts);
        $carts = [];
        foreach ($customer->carts as $key => $cart) {
            $carts[$key]['id'] = $cart->id;
            $carts[$key]['product_id'] = $cart->product->id;
            $carts[$key]['quantity'] = $cart->quantity;
            $carts[$key]['title'] = $cart->product->title??'';
            $carts[$key]['subtitle'] = $cart->product->subtitle??'';
            $carts[$key]['color_code'] = $cart->color_code;
            $carts[$key]['width'] = $cart->product->width;
            $carts[$key]['pick'] = $cart->product->pick;
            $carts[$key]['count'] = $cart->product->count;
            $carts[$key]['reed'] = $cart->product->reed;
            $carts[$key]['image_url'] = count($cart->product->image_list) > 0 ? $cart->product->image_list[0] : null;
        }
        $data['carts'] = $carts;
        return view('product.productcart',$data);
    }

    public function addtocart(Request $request)
    {
        $data = $request->only('product_id','quantity','color_code');
        $id = Auth::guard('customer')->id();
        if($id){
            $data['customer_id'] = $id;
            if($data['quantity'] > 0){
                Cart::updateOrCreate(['product_id'=>$data['product_id'], 'customer_id'=>$data['customer_id'],'color_code'=>$data['color_code']],$data);
                return response()->json([
                'status' => true,
                'message' => 'Product added to cart successfully.',
                ]);
            }else{
                Cart::where(['product_id'=>$data['product_id'], 'customer_id'=>$data['customer_id']])->delete();
                return response()->json([
                'status' => true,
                'message' => 'Product removed successfully.',
                ]);
            }
        }else{
            return response()->json([
            'status' => false,
            'message' => 'Please login as a customer than we can continue to add to cart prodcut',
            ]);
        }
    }

    public function deletecart(Request $request)
    {
        $data = $request->only('cart_id');
        $id = $data['cart_id'];
        Cart::find($id)->delete();
        return response()->json([
        'status' => true,
        'message' => 'Product removed successfully.',
        ]);
        
    }
    
}
