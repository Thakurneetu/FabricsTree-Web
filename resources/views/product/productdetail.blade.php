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
                <img src="{{ asset('frontend/images/image (1).png') }}" alt="#">
            </div>

            <div class="secondpage">


                <img src="{{ asset('frontend/images/image.png') }}" alt="" style="margin-top: 10px;">

                <img src="{{ asset('frontend/images/image (3).png') }}" alt="" style="margin-top: 10px;">


                <img src="{{ asset('frontend/images/image (3).png') }}" alt="" style="margin-top: 10px;">


                <img src="{{ asset('frontend/images/image (3).png') }}" alt="" style="margin-top: 10px;">
            </div>
        </div>


        <div class=" col-lg-6 col-md-6 col-sm-12 headparass">
            <h2>
                Off White Plain 40s Rayon Fabric
            </h2>

            <p>68 x 58 | 48” | Air Jet</p>

            <div class="colorhed">
                <div>Color:</div>
                <div class="colorpicker">&nbsp;</div>
                <div class="colorpicker" style="background: #FFE3BA;">&nbsp;</div>
                <div class="colorpicker" style="background: #FFC1E6;">&nbsp;</div>
                <div class="colorpicker" style="background: #AEE4FF;">&nbsp;</div>
                <div class="colorpicker" style="background: #000;">&nbsp;</div>
                <div class="colorpicker" style="background: #78239B;">&nbsp;</div>
            </div>

            <div style="display: flex;">
                <div>Quantity: &nbsp;</div>
                <button type="button" class="badge badgce-light" style="background: #EEF1F6; border: none;"><span
                        class="badge badge-light"><i class="fa fa-minus" aria-hidden="true"></i></span></button>
                <span style="font-weight: bold; margin: 4px;">5</span>
                <button type="button" class="badge badge-light" style="background: #EEF1F6;"><span
                        class="badge badge-light"><i class="fa fa-plus" aria-hidden="true"></i></span></button>
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
                        aria-selected="false">Descriptions</button>
                </li>
            </ul>
            <hr>


            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="childheadpara">
                        <h5>Descriptions</h5>
                        <p>
                            <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>
                            <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>

                        </p>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="childheadpara">
                        <h5>Key Features</h5>
                        <p>
                            <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>
                            <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>
                            <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>
                            <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>

                        </p>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="childheadpara">
                        <h5>Descriptions</h5>
                        <p>
                            <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>
                            <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>
                        </p>
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
                    <div class="card m-2">
                        <img class="card-img-top" src="{{ asset('frontend/images/p1.png') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-titles">Textile Suiting Fabric</h5>
                            <div class="reviews">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <button class="btn-outline-success maincolor KnowMore" type="submit">Add to Cart</button>


                        </div>

                    </div>
                    <div class="card m-2">
                        <img class="card-img-top" src="{{ asset('frontend/images/p2.png') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-titles">Textile Suiting Fabric</h5>
                            <div class="reviews">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <button class="btn-outline-success maincolor KnowMore" type="submit">Add to Cart</button>


                        </div>

                    </div>
                    <div class="card m-2">
                        <img class="card-img-top" src="{{ asset('frontend/images/p3.png') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-titles">Textile Suiting Fabric</h5>
                            <div class="reviews">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <button class="btn-outline-success maincolor KnowMore" type="submit">Add to Cart</button>


                        </div>

                    </div>
                    <div class="card m-2">
                        <img class="card-img-top" src="{{ asset('frontend/images/p3.png') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-titles">Textile Suiting Fabric</h5>
                            <div class="reviews">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <button class="btn-outline-success maincolor KnowMore" type="submit">Add to Cart</button>


                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>
@include('web.layouts.footer')
