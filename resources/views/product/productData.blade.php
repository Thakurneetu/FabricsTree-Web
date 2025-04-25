<?php 
use App\Models\Cart;
use App\Models\ManufacturerProduct;


    $html = '<div class="card-group">';
        $i=1;
        foreach($products as $products_val){
            if(@$customer){
                if($customer->user_type=='Customer') 
                {
                    $items = Cart::where('customer_id',$id)->where('product_id',$products_val->id)->get();
                }else{
                    $items = ManufacturerProduct::where('customer_id',$id)->where('product_id',$products_val->id)->get();
                }
            }else{
                $items = [];
            }
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
        if(count($items)==0){
            $html .= '<button class="btn-outline-success add_to_cart maincolor KnowMore" productid="'.$products_val->id.'" id="add_to_cart_'.$products_val->id.'" type="submit">';
            if($customer) 
            {
                if($customer->user_type=='Customer') 
                {
                    $html .= 'Add to Cart';
                }  
                else 
                {
                    $html .= 'Add to My Product';
                }
            }
            else
            {
                $html .= 'Add to Cart';
            }
            $html .= '</button>';

            $html .='<a href="'.route('product.productcart').'" ><button class="btn-outline-success maincolor KnowMore" id="go_to_cart_'.$products_val->id.'" style="display:none;margin: 0px 10px;" productid="'.$products_val->id.'" type="submit">';
            if($customer) 
            {
                if($customer->user_type=='Customer') 
                {
                    $html .= 'Go to Cart';
                }  
                else 
                {
                    $html .= 'Go to My Product';
                }
            }
            else
            {
                $html .= 'Go to Cart';
            } 
            
            $html .= '</button></a>';

        }else{

            $html .='<a href="'.route('product.productcart').'" ><button class="btn-outline-success maincolor KnowMore" id="go_to_cart_'.$products_val->id.'" style="margin: 0px 10px;" productid="'.$products_val->id.'" type="submit">';
            if($customer) 
            {
                if($customer->user_type=='Customer') 
                {
                    $html .= 'Go to Cart';
                }  
                else 
                {
                    $html .= 'Go to My Product';
                }
            }
            else
            {
                $html .= 'Go to Cart';
            } 
            
            $html .= '</button></a>';
        }
            $html .= '</div>';
            $html .= '</div>';
            if($i==4){
                $html .= '</div><div class="card-group" >';
                $i = 0;
            }
          $i++;
        }
        $html .= '</div>';

        echo $html ;
        ?>

        <div class="row">
            <div class="pagination-wrapper">
                {{$products->links()}}
                <div class="pagination-info mt-2 text-center text-sm text-gray-600">
                    Page {{$products->currentPage()}} of {{$products->lastPage()}}
                </div>
            </div>
        </div>
