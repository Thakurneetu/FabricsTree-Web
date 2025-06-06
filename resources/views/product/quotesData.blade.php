@if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    @if(count($request_quote)>0)
                        @foreach($request_quote as $value)
                            <div class="row mt-2 headparagraphbg">
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <div class="headparagraph" style="border-bottom:unset;margin: unset;">
                                        <img src="{{ asset('frontend/images/Frame 176.png') }}" alt="a" style="width: 70px;">

                                        <div class="alignment">
                                            <div style="margin: 5px;">
                                                <h3>{{$value['enquiry_items'][0]['title']}}</h3>
                                                <p style="margin:unset;">68 x 58 | 48” | Air Jet</p>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="bottom">
                                        {{-- <button type="button" class="btn btn-light"
                                            style="background: #fff; color:#78239B;margin: 5px;">LFB-31095</button> --}}
                                        <a href="{{ route('product.quotesitems')}}/{{$value['enquiry_id']}}" ><button type="button" class="btn btn-light"
                                            style="background: #fff; color:#78239B;margin: 5px;">View Items</button></a>
                                    </div>
                                </div>
                                <div class=" col-lg-7 col-md-7 col-sm-12 alignment2">

                                    <div class="top">
                                    @if($customer->user_type=='Customer')
                                        {{-- <div>
                                            <i class="fa fa-exclamation-circle" aria-hidden="true" style="font-size: 14px;"></i>
                                            Quotes are being prepared
                                        </div> --}}
                                        @if($value['status']=='invoiced')
                                            <a href="{{asset($value['qutation'])}}" target="_blank"><button style="background: #fff; color:#78239B;margin: 5px;border: none;border-radius:4px;padding: 2px 16px;"><i class="fa fa-paperclip" aria-hidden="true"></i> Invoice</button></a>
                                            <button style="background: #78239B; color: #fff; border: none; border-radius:4px;padding: 2px 16px;" enquiryid="{{$value['enquiry_id']}}" class="submit_accept_quotes">Accept</button>
                                        @elseif($value['status']=='accepted')
                                        <a href="{{asset($value['qutation'])}}" target="_blank"><button style="background: #fff; color:#78239B;margin: 5px;border: none;border-radius:4px;padding: 2px 16px;"><i class="fa fa-paperclip" aria-hidden="true"></i> Quote</button></a>
                                        <button style="background: #78239B; color: #fff; border: none; border-radius:4px;padding: 2px 16px;"> Accepted</button>
                                        @elseif($value['status']=='invoked')
                                        <button style="background: #78239B; color: #fff; border: none; border-radius:4px;padding: 2px 16px;">Revoked</button>
                                        @else
                                        <div>
                                            <i class="fa fa-exclamation-circle" aria-hidden="true" style="font-size: 14px;"></i>
                                            Quotes are being prepared
                                        </div>
                                        {{-- <button style="background: #78239B; color: #fff; border: none; border-radius:4px;padding: 2px 16px;" class="revoke_quote" id="{{$value['enquiry_id']}}" >Revoke Quote</button> --}}
                                        @endif
                                    @endif
                                    </div>

                                    <div class="bottom">
                                    @if($customer->user_type=='Customer')
                                        {{-- @if($value['status']=='invoked')
                                        <button>Revoked</button>
                                        @else
                                        <button class="revoke_quote" id="{{$value['enquiry_id']}}" >Revoke Quote</button>
                                        @endif --}}
                                        @if($value['status']=='submitted')
                                        <button style="background: #78239B; color: #fff; border: none; border-radius:4px;padding: 2px 16px;" class="revoke_quote" id="{{$value['enquiry_id']}}" >Revoke Quote</button>
                                        @endif

                                        <button style="background: #EEF1F6; border: 1px solid #B2BAC9; font-weight: bold;"><span style="color:#000;">Created :</span> <span style="color:#78239B;">{{$value['created_at']}}</span></button>
                                    @else
                                        @if($value['qutation']!='')
                                            <a href="{{asset($value['qutation'])}}" target="_blank"><button style="width:150px;">Uploaded Quote</button></a>
                                        @else
                                            <button class="upload_quote" id="{{$value['enquiry_id']}}" style="width:150px;">Upload Quote</button>
                                        @endif
                                        <button style="background: #EEF1F6; border: 1px solid #B2BAC9; font-weight: bold;width:350px;"><span style="color:#000;">Received On :</span> <span style="color:#78239B;">{{$value['created_at']}}</span></button>
                                    @endif
                                    </div>


                                </div>
                            </div>
                        @endforeach
                    @else
                    <div class="row headparagraph"><div class="col-lg-8 col-md-2 col-sm-12">No Request Quote List Found</div></div>
                    @endif
                    {{-- <div class="row mt-2 headparagraphbg">
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
                                <button type="button" class="btn btn-light"
                                    style="background: #fff; color:#78239B;margin: 5px;">LFB-31095</button>
                            </div>
                        </div>
                        <div class=" col-lg-6 col-md-6 col-sm-12 alignment3">

                            <div class="bottom">
                                <button style="background: #EEF1F6; border: 1px solid #B2BAC9; font-weight: bold;"><span
                                        style="color:#CB0000;">Revoked On :</span> <span style="color:#78239B;">Nov 15,
                                        2024</span> </button>
                            </div>


                        </div>
                    </div> --}}
                    </br>
                    </br>
                    <div class="row">
                        <!-- Pagination Links -->
                        <div class="pagination-wrapper">
                            {{ $request_quote->links() }}
                            <div class="pagination-info mt-2 text-center text-sm text-gray-600">
                                Page {{ $request_quote->currentPage() }} of {{ $request_quote->lastPage() }}
                            </div>
                        </div>
                    </div>
