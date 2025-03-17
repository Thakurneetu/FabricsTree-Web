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
use App\Models\EnquiryItems;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
            <h5 class="card-titles"><a href="'.route('product.productdetail').'/'.$products_val->id.'">'.$products_val->title.'</a></h5>';
            // $html .= '<div class="reviews">
            //     <i class="fa fa-star"></i>
            //     <i class="fa fa-star"></i>
            //     <i class="fa fa-star"></i>
            //     <i class="fa fa-star"></i>
            //     <i class="far fa-star"></i>
            // </div>';
            $html .= '<button class="btn-outline-success add_to_cart maincolor KnowMore" productid="'.$products_val->id.'" id="add_to_cart_'.$products_val->id.'" type="submit">Add to Cart</button>
            ';
            $html .='<a href="'.route('product.productcart').'" ><button class="btn-outline-success maincolor KnowMore" id="go_to_cart_'.$products_val->id.'" style="display: none;margin: 0px 35px;" productid="'.$products_val->id.'" type="submit">Go to Cart</button></a></div>';
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
            'message' => 'Please login as a customer than we can continue to add to cart product',
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
          'category_id' => 'required',
          'subcategory_id' => 'required',
          'width' => 'required',
          'wrap' => 'required',
          'weft' => 'required',
          'count' => 'required',
          'reed' => 'required',
          'pick' => 'required',
          'message' => 'required',
        ],
        [
            'category_id.required' =>'The category field is required.',
            'subcategory_id.required' =>'The sub category field is required.'
        ]);
    }

    public function requestaquotes(Request $request){
        
        $id = Auth::guard('customer')->id();
        if($id){
            $data = $request->only('enquery_type');

            if($data['enquery_type']=='custom'){
                try {
                    $this->validator($request->all())->validate();

                    //dd($request);die;
                    //$enquiry = $request->only('enquery_type','category_id','subcategory_id','width','warp','weft','count','reed','pick','message');
                    // $enquiry['customer_id'] = Auth::guard('customer')->id();
                    //Enquiry::create($enquiry);

                    $enquiry = new Enquiry();
                    $enquiry->customer_id = Auth::guard('customer')->id();
                    $enquiry->enquery_type = $request->enquery_type;
                    $enquiry->category_id = $request->category_id;
                    $enquiry->subcategory_id = $request->subcategory_id;
                    $enquiry->width = $request->width;
                    $enquiry->warp = $request->warp;
                    $enquiry->weft = $request->weft;
                    $enquiry->count = $request->count;
                    $enquiry->reed = $request->reed;
                    $enquiry->pick = $request->pick;
                    $enquiry->message = $request->message;
                    $enquiry->save();
                
                    return response()->json([
                        'status' => true,
                        'message' => 'You have been successfully submitted your customize info.',
                    ], 200);
                
                } catch(\Exception $e) {
                    return response()->json([
                        'status' => false,
                        'message' => $this->transformErrors($e),
                        'errors' => $e->getMessage(),
                    ], 400);
                }
            }else{

                $id = Auth::guard('customer')->id();
                $customer = Customer::find($id);
                //$data['customer'] = $customer;
                //dd($customer->carts);

                $enquiry = new Enquiry();
                $enquiry->enquery_type = $data['enquery_type'];
                $enquiry->customer_id = $id;
                $enquiry->save();
                $enquery_id = $enquiry->id;
                $carts = [];
                foreach ($customer->carts as $key => $cart) {

                    $enquiryItems = new EnquiryItems();
                    $enquiryItems->enquery_id = $enquery_id;
                    $enquiryItems->product_id = $cart->product->id;
                    $enquiryItems->quantity = $cart->quantity;
                    $enquiryItems->title = $cart->product->title??'';
                    $enquiryItems->subtitle = $cart->product->subtitle??'';
                    $enquiryItems->color_code = $cart->color_code;
                    $enquiryItems->description = $cart->product->description??'';
                    $enquiryItems->key_features = $cart->product->key_features??'';
                    $enquiryItems->disclaimer = $cart->product->disclaimer??'';
                    $enquiryItems->category_id = $cart->product->category_id??'';
                    $enquiryItems->requirement_id = $cart->product->requirement_id??'';
                    $enquiryItems->subcategory_id = $cart->product->subcategory_id??'';
                    $enquiryItems->width = $cart->product->width;
                    $enquiryItems->pick = $cart->product->pick;
                    $enquiryItems->count = $cart->product->count;
                    $enquiryItems->reed = $cart->product->reed;
                    $enquiryItems->warp = $cart->product->wrap;
                    $enquiryItems->weft = $cart->product->weft;
                    //$enquiryItems->image_url = count($cart->product->image_list) > 0 ? $cart->product->image_list[0] : null;
            
                    $enquiryItems->save();
                }
            
                //For delete all cart item
                Cart::where('customer_id',$id)->delete();

                return response()->json([
                'status' => true,
                'message' => 'Request a Quote Successfully Created.',
                ]);
            }
        }else{
            return response()->json([
            'status' => false,
            'message' => 'Please login as a customer than we can continue to add to cart product',
            ]);
        }
    }

    // transform the error messages,
    private function transformErrors(ValidationException $exception)
    {
        $errors = [];

        foreach ($exception->errors() as $field => $message) {
            //    $errors[] = [
            //        'field' => $field,
            //        'message' => $message,
            //    ];
            $errors[] = $message;     
        }

        return $errors;
    }
    
}
