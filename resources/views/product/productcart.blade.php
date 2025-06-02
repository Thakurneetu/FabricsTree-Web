@include('web.layouts.header')
    <div class="banneerlogo">
        <div style="flex-direction: column;">
            <h1>My @if(@$customer && $customer->user_type=='Customer') Carts @else Products @endif</h1>
            <p><span>Home</span>/ My @if(@$customer && $customer->user_type=='Customer') Carts @else Products @endif</p>
        </div>
    </div>

    <div class="container">
        <section class="sectionlast">
            <div class="headparagraphbg">

                <div class="row headparagraph">

                    <div class="col-lg-8 col-md-2 col-sm-12">
                        <div>Product Detail</div>
                    </div>
                    <div class=" col-lg-4 col-md-5 col-sm-12 alignment">
                        <div class="fouesec">
                        @if($customer)
                            @if($customer->user_type=='Customer')
                            <div class="">
                                Quantity
                            </div>
                            @endif
                        @endif
                            <div class="">
                                Action
                            </div>
                        </div>


                    </div>


                </div>
                @if(count($carts)>0)
                    
                    @foreach($carts as $key=>$cart)
                <div class="row headparagraph">

                    <div class="col-lg-8 col-md-2 col-sm-12">
                        <div class="alignment">
                            @if($cart['image_url'])
                            <img src="{{ $cart['image_url'] }}" alt="">
                            @else
                            <img src="{{ asset('frontend/images/Frame 176.png' )}}" alt="">
                            @endif
                            <div class="m-3">
                                <h3>{{$cart['title']}}</h3>
                                <p>68 x 58 | 48” | Air Jet</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-5 col-sm-12 alignment">
                        <div class="fouesec">
                            {{-- <div style="display: flex;">
                                <button type="button" class="badge badge-light"><span class="badge badge-light"><i
                                            class="fa fa-minus" aria-hidden="true"></i></span></button>
                                <span style="font-weight: bold;">1</span>
                                <button type="button" class="badge badge-light"><span class="badge badge-light"><i
                                            class="fa fa-plus" aria-hidden="true"></i></span></button>
                            </div> --}}
                            @if($customer)
                                @if($customer->user_type=='Customer')
                                <div style="display: flex;" class="sp-quantity">
                                    
                                    <button type="button" id="minus" class="badge1 badge-light ddd" productid="{{$cart['product_id']}}" style="border: none;"><span class="badge1 badge-light"><i class="fa fa-minus" aria-hidden="true"></i></span></button>
                                    
                                    <span style="font-weight: bold; margin: 4px;"><input type="number" class="quntity-input" value="{{ $cart['quantity'] }}" min="1" style="width:50px;background: #EEF1F6; border: none;text-align:center" readonly/></span>

                                    <button type="button" id="plus" class="badge1 badge-light ddd" productid="{{$cart['product_id']}}" style="border: none;"><span class="badge1 badge-light"><i class="fa fa-plus" aria-hidden="true"></i></span></button>
                                </div>
                                @endif
                            @endif

                            <div class="deteprod">
                                <i style="cursor: pointer;" class="fa fa-trash delete_cart" cartid="{{$cart['id']}}" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                </div>
                    @endforeach
                @else
                <div class="row headparagraph"><div class="col-lg-8 col-md-2 col-sm-12">No Record Found</div></div>
                @endif
            </div>
            <div class="row">
                @if($customer)
                    @if($customer->user_type=='Customer')
                    <div class="bottom col-md-2" >
                        <button @if(count($carts)>0) id="request_a_quote" @else onclick="alert('Please add to cart at least one item.');" @endif >Request a quote</button>
                    </div>
                    @endif
                @endif
                <div class="bottom col-md-2" >
                    <a class="dropdown-item" href="{{ route('product.index')}}"><button style="background: #83848A;">Add more product </button></a>
                </div>
            </div>

        </section>
    </div>
@include('web.layouts.footer')


<script>
    $(".ddd").on("click", function () {
        var $button = $(this).attr('id');
        var oldValue = $(this).closest('.sp-quantity').find("input.quntity-input").val();

        if ($button == "plus") {
            var msg = 'plus';
            var newVal = parseFloat(oldValue) + 1;
        } else {
            var msg = 'minus';
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $(this).closest('.sp-quantity').find("input.quntity-input").val(newVal);
        var id = $(this).attr('productid');
        var qty = newVal;
        add_to_cart(id,qty,msg);
    });

    $('#request_a_quote').click(function () {
      if (confirm("Are you sure want to request a quote for this cart item?") == true) {
      $.easyAjax({
        url: "{{ route('product.requestaquotes') }}",
        type: "POST",
        data: {
            '_token':$("input[name='_token']").val(),
            'enquery_type':'selected'
            },
        success: function(response) {
          if (response.status) {
            $('#exampleModalThankuinterest').modal('show');
            //swal("Sent!", response.message, "success");
            setInterval(function () {
                window.location.assign('{{ route("product.index");}} ');
            }, 5000);
          }
        }
      })
      }else{
        return false;
      }
    });
</script>
