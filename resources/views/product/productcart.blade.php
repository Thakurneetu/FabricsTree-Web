@include('web.layouts.header')
    <div class="banneerlogo">
        <div style="flex-direction: column;">
            <h1>Products</h1>
            <p><span>Home</span>/ My Cart</p>
        </div>
    </div>

    <div class="container">
        <section class="sectionlast">
            <div class="headparagraphbg">

                <div class="row headparagraph">

                    <div class="col-lg-8 col-md-2 col-sm-12">
                        <div>Product Details</div>
                    </div>
                    <div class=" col-lg-4 col-md-5 col-sm-12 alignment">
                        <div class="fouesec">
                            <div class="">
                                Quantity
                            </div>

                            <div class="">
                                Action
                            </div>
                        </div>


                    </div>


                </div>

                <div class="row headparagraph">

                    <div class="col-lg-8 col-md-2 col-sm-12">
                        <div class="alignment">
                            <img src="{{ asset('frontend/images/Frame 176.png' )}}" alt="">

                            <div class="m-3">
                                <h3>Rayon Plain | 30’s</h3>
                                <p>68 x 58 | 48” | Air Jet</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-5 col-sm-12 alignment">
                        <div class="fouesec">
                            <div style="display: flex;">
                                <button type="button" class="badge badge-light"><span class="badge badge-light"><i
                                            class="fa fa-minus" aria-hidden="true"></i></span></button>
                                <span style="font-weight: bold;">5</span>
                                <button type="button" class="badge badge-light"><span class="badge badge-light"><i
                                            class="fa fa-plus" aria-hidden="true"></i></span></button>
                            </div>

                            <div class="deteprod">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row headparagraph">

                    <div class="col-lg-8 col-md-2 col-sm-12">
                        <div class="alignment">
                            <img src="{{ asset('frontend/images/Frame 176.png' )}}" alt="">

                            <div class="m-3">
                                <h3>Rayon Plain | 30’s</h3>
                                <p>68 x 58 | 48” | Air Jet</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-5 col-sm-12 alignment">
                        <div class="fouesec">
                            <div style="display: flex;">
                                <button type="button" class="badge badge-light"><span class="badge badge-light"><i
                                            class="fa fa-minus" aria-hidden="true"></i></span></button>
                                <span style="font-weight: bold;">5</span>
                                <button type="button" class="badge badge-light"><span class="badge badge-light"><i
                                            class="fa fa-plus" aria-hidden="true"></i></span></button>
                            </div>

                            <div class="deteprod">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row headparagraph">

                    <div class="col-lg-8 col-md-2 col-sm-12">
                        <div class="alignment">
                            <img src="{{ asset('frontend/images/Frame 176.png' )}}" alt="">

                            <div class="m-3">
                                <h3>Rayon Plain | 30’s</h3>
                                <p>68 x 58 | 48” | Air Jet</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-5 col-sm-12 alignment">
                        <div class="fouesec">
                            <div style="display: flex;">
                                <button type="button" class="badge badge-light"><span class="badge badge-light"><i
                                            class="fa fa-minus" aria-hidden="true"></i></span></button>
                                <span style="font-weight: bold;">5</span>
                                <button type="button" class="badge badge-light"><span class="badge badge-light"><i
                                            class="fa fa-plus" aria-hidden="true"></i></span></button>
                            </div>

                            <div class="deteprod">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="bottom">
                <button>Request a quote </button>
                <button style="background: #83848A;">Add more product </button>
            </div>

        </section>
    </div>
@include('web.layouts.footer')