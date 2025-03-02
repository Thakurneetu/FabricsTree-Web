@include('web.layouts.header')
<div class="banneerlogo">
        <div style="flex-direction: column;">
            <h1>Products</h1>
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
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    On The Way
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="flexRadioDefault"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Delivered
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="flexRadioDefault"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Returned
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12">

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
                                <button style="background: #78239B; color: #fff; border: none; border-radius:4px;padding: 2px 16px;">Track
                                    Order</button>
                            </div>

                            <div class="bottom">
                                <button>Revoke Order</button>
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
                    
                </div>

        </section>
    </div>
@include('web.layouts.footer')