@include('web.layouts.header')
    <div class="banneerlogo">
        <div style="flex-direction: column;">
            <h1>My Quotes</h1>
            <p><span>Home</span>/ View Request Quote Item Detail</p>
        </div>
    </div>

    <div class="container">
        <section class="sectionlast">
            <div class="headparagraphbg">
            <div class="row headparagraph">
            @if($customer)
                @if($customer->user_type=='Customer')
                <h5 style="margin-left: -12px;">Customer Detail</h5>
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
                </div>
                @endif
            @else
            <h5>Customer Details</h5>
            @endif
                @if($enquery_type=='custom')
                    <div class="row headparagraph">

                        <div class="col-lg-8 col-md-2 col-sm-12">
                            <h5 style="margin-left: -12px;">View Request Quote Item Detail</h5>
                        </div>
                            <table class="table table-borderless table-responsive-md">
                            <colgroup>
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Width</th>
                                    <th>Warp</th>
                                    <th>Weft</th>
                                    <th>Count</th>
                                    <th>Reed</th>
                                    <th>Pik</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Custom</td>
                                <td>{{$enquiry->category->name}}</td>
                                <td>{{$enquiry->subcategory->name}}</td>
                                <td>{{$enquiry->width}}</td>
                                <td>{{$enquiry->warp}}</td>
                                <td>{{$enquiry->weft}}</td>
                                <td>{{$enquiry->count}}</td>
                                <td>{{$enquiry->reed}}</td>
                                <td>{{$enquiry->pick}}</td>
                            </tr>
                            </tbody>
                            </table>
                            <button style="background: #EEF1F6; border: 1px solid #B2BAC9; font-weight: bold;width:350px;"><span style="color:#000;">Created On:</span> <span style="color:#78239B;">{{date('d M, Y h:i A',strtotime(@$customer->enquiry[0]->created_at))}}</span></button> 
                                        </div>
                    </div>
                @else
                    @if(count($enquiry_items)>0)
                    <div class="row headparagraph">
                    <h5 style="margin-left: -12px;">Request Quote Item Detail</h5>
                    <table class="table table-borderless table-responsive-md">
                            <colgroup>
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Width</th>
                                    <th>Warp</th>
                                    <th>Weft</th>
                                    <th>Count</th>
                                    <th>Reed</th>
                                    <th>Pik</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enquiry_items as $key=>$val)
                                <tr>
                                    <td>{{$val['title']}}</td>
                                    <td>{{$val['category_name'] }}</td>
                                    <td>{{$val['subcategory_name']}}</td>
                                    <td>{{$val['width']}}</td>
                                    <td>{{$val['warp']}}</td>
                                    <td>{{$val['weft']}}</td>
                                    <td>{{$val['count']}}</td>
                                    <td>{{$val['reed']}}</td>
                                    <td>{{$val['pick']}}</td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            </table>
                            <div class="bottom" style="margin-left: -13px;">
                            @if($customer)
                                @if($customer->user_type=='Manufacturer')
                                    @if(@$enquiry_data[0]['manufacturer_qutation']!='')
                                        <a href="{{@asset($enquiry_data[0]['manufacturer_qutation'])}}" target="_blank"><button style="width:150px;">Uploaded Quote</button></a>
                                    @else
                                        <button class="upload_quote" id="{{@$enquiry_items[0]['enquery_id']}}" style="width:150px;">Upload Quote</button>
                                    @endif    
                                    <button style="background: #EEF1F6; border: 1px solid #B2BAC9; font-weight: bold;"><span style="color:#000;">Received On :</span> <span style="color:#78239B;">{{date('d M, Y h:i A',strtotime(@$enquiry_data[0]['created_at']))}}</span></button> 
                                @else
                                    <button style="background: #EEF1F6; border: 1px solid #B2BAC9; font-weight: bold;"><span style="color:#000;">Created On:</span> <span style="color:#78239B;">{{date('d M, Y h:i A',strtotime(@$enquiry_data->created_at))}}</span></button> 
                                       
                                @endif
                            @endif
                            </div>
                        <!-- <div class="col-lg-8 col-md-2 col-sm-12">
                            <div class="alignment">
                                @if($val['image_url'])
                                <img src="{{ $val['image_url'] }}" alt="">
                                @else
                                <img src="{{ asset('frontend/images/Frame 176.png' )}}" alt="">
                                @endif
                                <div class="m-3">
                                    <h3>{{$val['title']}}</h3>
                                    <p>68 x 58 | 48” | Air Jet</p>
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-4 col-md-5 col-sm-12 alignment">
                            <div class="fouesec">
                                <div style="display: flex;" class="sp-quantity">
                                    <span style="font-weight: bold; margin: 4px;"><input type="number" value="{{ $val['quantity'] }}" min="1" style="width:50px;background: #EEF1F6; border: none;text-align:center" readonly/></span>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    @else
                    <div class="row headparagraph"><div class="col-lg-8 col-md-2 col-sm-12">No Request Quote item list Found</div></div>
                    @endif
                @endif
                <div class="row" style="margin-left: 5px;">
                    <div class="bottom col-md-2" >
                        <a class="dropdown-item" href="{{ route('product.index')}}"><button style="background: #83848A;">Add more product </button></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="dropdown-item" href="{{ route('product.productquotes')}}"><button style="background: #83848A;">Back </button></a>
                    </div>
                </div>
            </div>
            
        </section>
    </div>
@include('web.layouts.footer')

<script>

    $('.upload_quote').click(function () {
        $('#upload_enquiry_id').val($(this).attr('id'));
        $('#exampleModalUploadQuote').modal('show');
    });
</script>