@include('web.layouts.header')
<div class="banneerlogo">
        <div style="flex-direction: column;">
            <h1>Products</h1>
            <p><span>Home</span>/ My Quotes</p>
        </div>
    </div>

    <div class="container">
        <section class="sectionlast p-2">


            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-12 mt-2 siedaemo">
                    <div class="headparagraphbg">
                        <div class="MyQuotes p-2">
                            <div>My Quotes</div>
                            <div>Clear All</div>
                        </div>
                        <hr>

                        <div class="p-2">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    All Quotes
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="flexRadioDefault"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Quotes not Received
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="flexRadioDefault"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Closed
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12">

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
                                        <button type="button" class="btn btn-light"
                                            style="background: #fff; color:#78239B;margin: 5px;">LFB-31095</button>
                                        <a href="{{ route('product.quotesitems')}}/{{$value['enquiry_id']}}" ><button type="button" class="btn btn-light"
                                            style="background: #fff; color:#78239B;margin: 5px;">View Items</button></a>
                                    </div>
                                </div>
                                <div class=" col-lg-7 col-md-7 col-sm-12 alignment2">

                                    <div class="top">
                                        <div>
                                            <i class="fa fa-exclamation-circle" aria-hidden="true" style="font-size: 14px;"></i>
                                            Quotes are being prepared
                                        </div>
                                    </div>

                                    <div class="bottom">
                                        <button>Revoke Order</button>
                                        <button style="background: #EEF1F6; border: 1px solid #B2BAC9; font-weight: bold;"><span
                                                style="color:#000;">Created :</span> <span style="color:#78239B;">{{$value['created_at']}}</span></button>
                                    </div>


                                </div>
                            </div>
                        @endforeach
                    @else
                    <div class="row headparagraph"><div class="col-lg-8 col-md-2 col-sm-12">No Request Quote List Found</div></div>
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
                    </div> -->
                    
                </div>

        </section>
    </div>
@include('web.layouts.footer')