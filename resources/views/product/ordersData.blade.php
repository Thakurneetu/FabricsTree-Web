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
    {{-- 
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
    </div> 
    --}}
    </br>
    </br>
    <div class="row">
        <!-- Pagination Links -->
        <div class="pagination-wrapper">
            {{ $orders->links() }}
            <div class="pagination-info mt-2 text-center text-sm text-gray-600">
                Page {{ $orders->currentPage() }} of {{ $orders->lastPage() }}
            </div>
        </div>
    </div>
