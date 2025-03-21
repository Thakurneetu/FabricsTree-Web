@include('web.layouts.header')
    <div class="banneerlogo">
        <div style="flex-direction: column;">
            <h1>Orders Detail</h1>
            <p><span>Home</span>/ View Order Item Details</p>
        </div>
    </div>

    <div class="container">
        <section class="sectionlast">
            <div class="headparagraphbg">

                <div class="row headparagraph">
                <h5>Customer Details</h5>
                    <table class="table table-borderless table-responsive-md">
                        <colgroup>
                            <col style="width: 30%;">
                            <col style="width: 70%;">
                        </colgroup>
                        <tr>
                            <th>Name:</th>
                            <td>{{$customer->name}}</td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td>{{$customer->phone}}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{$customer->email}}</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>{{$customer->address.', '.$customer->pincode}}</td>
                        </tr>
                    </table>
                    <div class="col-lg-8 col-md-2 col-sm-12">
                        <div>Order Item Details</div>
                    </div>
                    <div class=" col-lg-4 col-md-5 col-sm-12 alignment">
                        <div class="fouesec">
                            <div class="">
                                Quantity
                            </div>
                        </div>
                    </div>
                </div>
                @if(count($order_items)>0)
                    @foreach($order_items as $key=>$val)
                <div class="row headparagraph">
                    <div class="col-lg-8 col-md-2 col-sm-12">
                        <div class="alignment">
                            @if($val['image_url'])
                            <img src="{{ $val['image_url'] }}" alt="">
                            @else
                            <img src="{{ asset('frontend/images/Frame 176.png' )}}" alt="">
                            @endif
                            <div class="m-3">
                                <h3>{{$val['title']?$val['title']:'Custom Product'}}</h3>
                                <p>68 x 58 | 48” | Air Jet</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-5 col-sm-12 alignment">
                        <div class="fouesec">
                            <div style="display: flex;" class="sp-quantity">
                                <span style="font-weight: bold; margin: 4px;"><input type="number" value="{{ $val['quantity']?$val['quantity']:1 }}" min="1" style="width:50px;background: #EEF1F6; border: none;text-align:center" readonly/></span>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                @else
                <div class="row headparagraph"><div class="col-lg-8 col-md-2 col-sm-12">No Request Quote item list Found</div></div>
                @endif
            </div>
            <div class="row">
                <div class="bottom col-md-2" >
                    <!-- <a class="dropdown-item" href="{{ route('product.index')}}"><button style="background: #83848A;">Add more product </button></a> -->

                    <a class="dropdown-item" href="{{ route('product.orders')}}"><button style="background: #83848A;">Back </button></a>
                </div>
            </div>
        </section>
    </div>
@include('web.layouts.footer')