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
use App\Models\ManufacturerProduct;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        DB::enableQueryLog();
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;
        $data['id'] = $id;
        $data['page_url'] = $request->segment(1);

        //$data['products'] = Product::select("*")->paginate(50);
        $query = Product::select('id','title','subtitle','description','key_features','disclaimer','category_id','requirement_id','subcategory_id','width','count','reed','pick');

        if($customer && $customer->user_type=='Manufacturer' && $request->segment(1)=='myproduct'){
            $manufacturer_prod_data = DB::table('manufacturer_products')
            ->select('product_id','id as cartid')
            ->where('customer_id', $id)
            ->get();
           
            $prodIdArray = [];
            if(count($manufacturer_prod_data) >0)
            {
                foreach($manufacturer_prod_data as $val){
                $prodIdArray[] = $val->product_id;
                }
            }
            if ($prodIdArray)
                $query->whereIn('id', $prodIdArray);
            else
                $query->whereIn('id', array('10000000000000000'));
        }

        $products = $query->paginate(50, ['*'], 'page',$request->input('page', 1));
        //dd(DB::getQueryLog());
            
        $data['products'] = $products;
        
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
        
        return view('product.index',$data);
    }

    public function filter(Request $request)
    {
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
        $data['id'] = $id;
        
                $page_url = $request->input('page_url');
                $categoryId = $request->input('categoryId');
                $requirementId = $request->input('requirementId');
                $subcategoryId = $request->input('subcategoryId');
                $width = $request->input('width');
                $count = $request->input('count');
                $reed = $request->input('reed');
                $pick = $request->input('pick');
                DB::enableQueryLog();
                $query = Product::select('id','title','subtitle','description','key_features','disclaimer','category_id','requirement_id','subcategory_id','width','count','reed','pick');
                
                if($customer && $customer->user_type=='Manufacturer' && $page_url=='myproduct'){
                    $manufacturer_prod_data = DB::table('manufacturer_products')
                    ->select('product_id','id as cartid')
                    ->where('customer_id', $id)
                    ->get();
                    $prodIdArray = [];
                    if(count($manufacturer_prod_data) >0)
                    {
                        foreach($manufacturer_prod_data as $val){
                        $prodIdArray[] = $val->product_id;
                        }
                    }
                    if ($prodIdArray)
                        $query->whereIn('id', $prodIdArray);
                    else
                    $query->whereIn('id', array('10000000000000000'));
                }

                if ($categoryId)
                    $query->whereIn('category_id', $categoryId);
                if ($requirementId)
                    $query->whereIn('requirement_id', $requirementId);
                if ($subcategoryId)
                    $query->whereIn('subcategory_id', $subcategoryId);
                if ($width)
                    $query->whereIn('width', $width);
                if ($count)
                    $query->whereIn('count', $count);
                if ($reed)
                    $query->whereIn('reed', $reed);
                if ($pick)
                    $query->whereIn('pick', $pick);
                
            $products = $query->paginate(50, ['*'], 'page',$request->input('page', 1));
            //dd(DB::getQueryLog());
            
            $data['products'] = $products;
            $data['page_url'] = $page_url;
            if($request->ajax())
            {
                $proData = view('product.productData',$data)->render();

                return response()->json([
                    'status' => true,
                    'message' => 'Data Get successfully.',
                    'data' => $proData,
                ], 200);

            }else{
                return view('product.index',$data);
            }
    }

    public function subcategories(Request $request)
    {
        $categoryId = $request->input('categoryId');
        $subcategories = Subcategory::whereIn('category_id',$categoryId)->get();

        $html = '';
        if(count($subcategories)>0){
            foreach($subcategories as $subcategory){
                $html .= '<div class="form-check mt-3">
                    <input title="'.$subcategory->name.'" class="form-check-input search_filter" type="checkbox" name="subcategory_id[]" id="subcategory_id_'.$subcategory->id.'" value="'.$subcategory->id.'">
                    <label class="form-check-label" for="flexRadioDefault1">
                    '.$subcategory->name.'
                    </label>
                </div>';
            }
        }else{
            $html .= '<div class="form-check mt-3">No Record Found</div>';
        }

        return response()->json([
            'status' => true,
            'message' => 'Data Get successfully.',
            'data' => $html,
        ], 200);
    }

    public function requirements(Request $request)
    {
        $categoryId = $request->input('categoryId');
        $requirements = Requirement::whereIn('category_id',$categoryId)->get();

        $html = '';
        if(count($requirements)>0){
            foreach($requirements as $requirement){
                $html .= '<div class="form-check mt-3">
                    <input title="'.$requirement->name.'" class="form-check-input search_filter" type="checkbox" name="requirement_id[]" id="requirement_id_'.$requirement->id.'" value="'.$requirement->id.'">
                    <label class="form-check-label" for="flexRadioDefault1">
                    '.$requirement->name.'
                    </label>
                </div>';
            }
        }else{
            $html .= '<div class="form-check mt-3">No Record Found</div>';
        }

        return response()->json([
            'status' => true,
            'message' => 'Data Get successfully.',
            'data' => $html,
        ], 200);
    }

    public function productdetail($id)
    {
        $data['products_data'] = Product::find($id);
        $data['products'] = Product::select("*")->inRandomOrder()->get();
        $customer_id = Auth::guard('customer')->id();
        $data['cart_item'] = Cart::where('customer_id',$customer_id)->where('product_id',$id)->get();
        $customer = Customer::find($customer_id);
        $data['customer'] = $customer;

       // print_r(count($data['customer']->carts));
        $carts = [];
        if(@$customer){
            if($customer->user_type=='Customer'){
                foreach ($customer->carts as $key => $cart) {
                    $carts[$key] = $cart->product->id;
                }
            }else{
                foreach ($customer->manufacturerProduct as $key => $manufacturer_product) {
                    $carts[$key] = $manufacturer_product->product->id;
                }
            }
        }
        $data['carts'] = $carts;
        return view('product.productdetail',$data);
    }

    public function productcart(Request $request)
    {
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        $data['customer'] = $customer;
        if(@$customer->user_type==''){
            return redirect('/')->withError('Session Expired');
        }
        //dd($customer->carts);
        $carts = [];
        if($customer->user_type=='Customer'){
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
        }else{
            foreach ($customer->manufacturerProduct as $key => $manufacturer_product) {
                $carts[$key]['id'] = $manufacturer_product->id;
                $carts[$key]['product_id'] = $manufacturer_product->product->id;
                $carts[$key]['quantity'] = $manufacturer_product->quantity;
                $carts[$key]['title'] = $manufacturer_product->product->title??'';
                $carts[$key]['subtitle'] = $manufacturer_product->product->subtitle??'';
                $carts[$key]['color_code'] = $manufacturer_product->color_code;
                $carts[$key]['width'] = $manufacturer_product->product->width;
                $carts[$key]['pick'] = $manufacturer_product->product->pick;
                $carts[$key]['count'] = $manufacturer_product->product->count;
                $carts[$key]['reed'] = $manufacturer_product->product->reed;
                $carts[$key]['image_url'] = count($manufacturer_product->product->image_list) > 0 ? $manufacturer_product->product->image_list[0] : null;
            }
        }
        $data['carts'] = $carts;
        return view('product.productcart',$data);
    }

    public function addtocart(Request $request)
    {
        $data = $request->only('product_id','quantity','color_code');
        $id = Auth::guard('customer')->id();
        if($id){
            $customer = Customer::find($id);
            if( $customer->user_type=='Customer')
            {
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
            }
            else
            {
                $data['customer_id'] = $id;
                $product = Product::find($data['product_id']);
                if($data['quantity'] > 0){
                    ManufacturerProduct::updateOrCreate([
                        'product_id'=>$data['product_id'],
                        'customer_id'=>$data['customer_id'],
                        'title'=> $product->title,
                        'subtitle'=> $product->subtitle,
                        'color_code'=> $product->color_code,
                        'width'=> $product->width,
                        'pick'=> $product->pick,
                        'count'=> $product->count,
                        'reed'=> $product->reed,
                        'description'=> $product->description,
                        'key_features'=> $product->key_features,
                        'disclaimer'=> $product->disclaimer,
                        'category_id'=> $product->category_id,
                        'requirement_id'=> $product->requirement_id,
                        'subcategory_id'=> $product->subcategory_id,
                        'wrap'=>$product->wrap,
                        'weft'=> $product->weft,
                        'quantity'=>$data['quantity']
                    ],
                        $data);
                    return response()->json([
                    'status' => true,
                    'message' => 'Successfully added to My Product List.',
                    ]);
                }else{
                    ManufacturerProduct::where(['product_id'=>$data['product_id'], 'customer_id'=>$data['customer_id']])->delete();
                    return response()->json([
                    'status' => true,
                    'message' => 'Successfully removed to My Product List.',
                    ]);
                }
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
        $cart_id = $data['cart_id'];
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        if($customer->user_type=='Customer'){
            Cart::find($cart_id)->delete();
        }else{
            ManufacturerProduct::find($cart_id)->delete();
        }
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
                foreach ($customer->carts as $cart) {

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
