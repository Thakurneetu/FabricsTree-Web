@include('web.layouts.header')
    <div class="banneerlogo">
        <div style="flex-direction: column;">
            <h1>Products</h1>
            <p><span>Home</span>/ My Cart</p>
        </div>
    </div>


    <div class=" row secondpagediv">

        <div class="col-lg-6 col-md-6 col-sm-12 ">
            <div class="largeimage">
                @if(isset($products_data) && count($products_data->images) > 0)
                  <a href="{{route('product.productdetail')}}/{{$products_data->id}}"><img class="card-img-top" src="{{asset($products_data->images[0]->path)}}" alt="Card image cap"></a>
                @endif
            </div>

            <div class="secondpage">
            @if(isset($products_data) && count($products_data->images) > 0)
                @foreach($products_data->images as $image)
                <img src="{{asset($image->path)}}" alt="" style="margin-top: 10px;">
                @endforeach
            @endif

            </div>
        </div>


        <div class=" col-lg-6 col-md-6 col-sm-12 headparass">
            <h2>
                {{$products_data->title}}
            </h2>

            <p>68 x 58 | 48” | Air Jet</p>

            <!-- <div class="colorhed">
                <div>Color:</div>
                @if(isset($products_data) && count($products_data->colors) > 0)
                @foreach($products_data->colors as $color)
                    <div class="colorpicker" style="background: {{$color->code}}">&nbsp;</div>
                @endforeach
                @endif
            </div> -->

            <div style="display: flex;" class="sp-quantity">
                <div>Quantity: &nbsp;</div>
                <button type="button" id="minus" class="badge badgce-light ddd" style="background: #EEF1F6; border: none;"><span class="badge badge-light"><i class="fa fa-minus" aria-hidden="true"></i></span></button>
                
                <span style="font-weight: bold; margin: 4px;"><input type="number" class="quntity-input" value="1" min="1" style="width:50px" readonly/></span>

                <button type="button" id="plus" class="badge badge-light ddd" style="background: #EEF1F6;"><span class="badge badge-light"><i class="fa fa-plus" aria-hidden="true"></i></span></button>
            </div>

            <div class="buttonsection2">
                <button>Add to cart</button>
            </div>

            <hr>
            <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Descriptions</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">Key Features</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Disclaimers</button>
                </li>
            </ul>
            <hr>


            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="childheadpara">
                        <h5>Descriptions</h5>
                        {{strip_tags($products_data->description)}}
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="childheadpara">
                        <h5>Key Features</h5>
                        {{strip_tags($products_data->key_features)}}
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="childheadpara">
                        <h5>Disclaimers</h5>
                        {{strip_tags($products_data->disclaimer)}}
                    </div>
                </div>
            </div>



        </div>
    </div>
    <div class="container-fluid productcolor">
        <div class="container">
            <div class="row Product" style="padding-bottom: 2rem;">
                <p class="Greigefabric_gal">Related Product</p>
                <div class="card-group">
                @foreach($products as $products_val)
                    <div class="card m-2">
                        @if(isset($products_val) && count($products_val->images) > 0)
                        <a href="{{route('product.productdetail')}}/{{$products_val->id}}"><img class="card-img-top" src="{{asset($products_val->images[0]->path)}}" alt="Card image cap"></a>
                        @endif
                        <div class="card-body">
                            <h5 class="card-titles"><a href="{{route('product.productdetail')}}/{{$products_val->id}}">{{$products_val->title}}</a></h5>
                            <div class="reviews">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <!-- maincolor -->
                            <button class="btn-outline-success  KnowMore" type="submit">Add to Cart</button>
                        </div>
                    </div>
                @endforeach    
                </div>
            </div>
        </div>

    </div>
@include('web.layouts.footer')


<script>
    $(".ddd").on("click", function () {
        var $button = $(this).attr('id');
        var oldValue = $(this).closest('.sp-quantity').find("input.quntity-input").val();

        if ($button == "plus") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $(this).closest('.sp-quantity').find("input.quntity-input").val(newVal);
    });
</script>