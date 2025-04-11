@include('web.layouts.header')
<div class="banneerlogo">
        <div style="flex-direction: column;">
            <h1>My Orders</h1>
            <p><span>Home</span>/ My Orders</p>
        </div>
    </div>

    <div class="container">
        <section class="sectionlast p-2">


            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-12 mt-2 siedaemo">
                    <div class="headparagraphbg">
                        <div class="MyQuotes p-2">
                            <div>My Orders</div>
                            <div>Clear All</div>
                        </div>
                        <hr>

                        <div class="p-2">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    All Orders
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="flexRadioDefault"
                                    id="flexRadioDefault2" >
                                <label class="form-check-label" for="flexRadioDefault2">
                                    On The Way
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="flexRadioDefault"
                                    id="flexRadioDefault2" >
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Delivered
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="flexRadioDefault"
                                    id="flexRadioDefault2" >
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Returned
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12">
                    @if(count($orders)>0)
                        @foreach($orders as $value)
                            <div class="row mt-2 headparagraphbg">
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <div class="headparagraph" style="border-bottom:unset;margin: unset;">
                                        <img src="{{ asset('frontend/images/Frame 176.png') }}" alt="a" style="width: 70px;">

                                        <div class="alignment">
                                            <div style="margin: 5px;">
                                                <h3>{{$value->items[0]->title?$value->items[0]->title:'Custom Product'}}</h3>
                                                <p style="margin:unset;">68 x 58 | 48” | Air Jet</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bottom">
                                        <button type="button" class="btn btn-light" style="background: #fff; color:#78239B;margin: 5px;">{{$value->invoice_no}}</button>

                                        <a href="{{ route('product.orderitems')}}/{{$value['id']}}" ><button type="button" class="btn btn-light"
                                            style="background: #fff; color:#78239B;margin: 5px;">View Items</button></a>
                                    </div>
                                </div>
                                <div class=" col-lg-7 col-md-7 col-sm-12 alignment2">
                                    <div class="top">
                                        <a href="{{asset($value->qutation)}}" target="_blank"><button style="background: #fff; color:#78239B;margin: 5px;border: none;border-radius:4px;padding: 2px 16px;"><i class="fa fa-paperclip" aria-hidden="true"></i> Invoice</button></a>
                                        <button style="background: #78239B; color: #fff; border: none; border-radius:4px;padding: 2px 16px;">Track Order</button>
                                    </div>

                                    <div class="bottom">
                                     
                                    @if($value['status']=='Pending' || $value['status']=='Dispatched')
                                        @if($customer->user_type=='Customer')
                                        <button class="revoke_order" id="{{$value['id']}}">Revoke Order</button>
                                        @endif
                                        <button style="background: #EEF1F6; border: 1px solid #B2BAC9;"><span style="color:#000;">Created:</span><span style="color:#78239B;">{{date('M d, Y h:i A',strtotime($value->created_at))}}</span> </button>
                                    @elseif($value['status']=='Delivered')
                                        <button class="return_order" id="{{$value['id']}}">Return Order</button> 
                                        <button style="background: #EEF1F6; border: 1px solid #B2BAC9;"><span style="color:#000;">Created:</span><span style="color:#78239B;">{{date('M d, Y h:i A',strtotime($value->created_at))}}</span> </button>  
                                    @elseif($value['status']=='Cancelled') 
                                        <button>Cancelled</button>
                                        <button style="background: #EEF1F6; border: 1px solid #B2BAC9;"><span style="color:#000;">Created:</span><span style="color:#78239B;">{{date('M d, Y h:i A',strtotime($value->created_at))}}</span> </button>
                                    @elseif($value['status']=='Returned') 
                                        <button>Returned</button>
                                        <button style="background: #EEF1F6; border: 1px solid #B2BAC9;"><span style="color:#000;">Returned on :</span><span style="color:#78239B;">{{date('M d, Y h:i A',strtotime($value->created_at))}}</span> </button>
                                    @elseif($value['status']=='Revoked') 
                                        <button>Revoked</button>
                                        <button style="background: #EEF1F6; border: 1px solid #B2BAC9;"><span style="color:#000;">Revoked on:</span><span style="color:#78239B;">{{date('M d, Y h:i A',strtotime($value->created_at))}}</span> </button>
                                    @endif
                                    </div>


                                </div>
                            </div>
                        @endforeach
                    @else
                    <div class="row headparagraph"><div class="col-lg-8 col-md-2 col-sm-12">No Order List Found</div></div>
                    @endif

                    <!-- <div class="row mt-2 headparagraphbg">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="headparagraph" style="border-bottom:unset;margin: unset;">
                                <img src="{{ asset('frontend/images/Frame 176.png') }}" alt="a" style="width: 70px;">

                                <div class="alignment">
                                    <div style="margin: 5px;">
                                        <h3>Rayon Plain | 30’s</h3>
                                        <p style="margin:unset;">68 x 58 | 48” | Air Jet</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bottom">
                                <button type="button" class="btn btn-light" style="background: #fff; color:#78239B;margin: 5px;">LFB-31095</button>
                            </div>
                        </div>
                        <div class=" col-lg-6 col-md-6 col-sm-12 alignment2">

                            <div class="top">

                                <button style="background: #fff; color:#78239B;margin: 5px;border: none;border-radius:4px;padding: 2px 16px;">Download
                                    PDF</button>
                         
                            </div>

                            <div class="bottom">
                           
                                <button style="background: #EEF1F6; border: 1px solid #B2BAC9;"><span style="color:#000;">Created:</span><span style="color:#78239B;">Nov 15,
                                        2024</span> </button>
                            </div>


                        </div>
                    </div>

                    <div class="row mt-2 headparagraphbg">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="headparagraph" style="border-bottom:unset;margin: unset;">
                                <img src="{{ asset('frontend/images/Frame 176.png') }}" alt="a" style="width: 70px;">

                                <div class="alignment">
                                    <div style="margin: 5px;">
                                        <h3>Rayon Plain | 30’s</h3>
                                        <p style="margin:unset;">68 x 58 | 48” | Air Jet</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bottom">
                                <button type="button" class="btn btn-light" style="background: #fff; color:#78239B;margin: 5px;">LFB-31095</button>
                            </div>
                        </div>
                        <div class=" col-lg-6 col-md-6 col-sm-12 alignment2">

                            <div class="top">

                                <button style="background: #EEF1F6; border: 1px solid #B2BAC9;border-radius:4px;"><span style="color:#CB0000;">Return On:</span><span style="color:#78239B;">Nov 15,
                                        2024</span> </button>

                            </div>


                        </div>
                    </div> -->
                    
                </div>

        </section>
    </div>
@include('web.layouts.footer')

<script>
    $('.revoke_order').click(function () {
        $('#order_id').val($(this).attr('id'));
        $('#exampleModalRevokeOrder').modal('show');
    });


    $('.return_order').click(function () {
        var order_id = $(this).attr('id');
        if (confirm("Are you sure want to return this order?") == true) {  
        $.easyAjax({
            url: "{{ route('product.returnorder') }}",
            //container: '#revoke_order_form',
            //type: "POST",
            //redirect: true,
            data: {'order_id':order_id},//$('#revoke_order_form').serialize(),
            success: function(response) {
            if (response.status) {
                
                swal("Sent!", response.message, "success");
                setInterval(function () {
                    window.location.assign('{{ route("product.orders");}} ');
                }, 3000);
            }
            }                    
        })
      }else{
        return false;
      }
    });

</script>