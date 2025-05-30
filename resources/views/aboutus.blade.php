@include('web.layouts.header')
    <div class="banneerlogo">
        <div style="flex-direction: column;">
            <h1>About Us</h1>
            <p><span>Home</span>/ About Us</p>
        </div>
    </div>

    <div class="container-fluid mt-5">
      
        <div class="container-fluid aboutsbg">

            <div class="row Product mt-4" style="padding-bottom: 3rem;">

            <div class="col-md-6 col-sm-12 mb-3 mb-sm-0">
                <div class="row">
                <div class="col-md-6 col-sm-12 mb-3 mb-sm-0 topsliderright">
                    <img src="{{ asset('frontend/images/fabric.png') }}" class="d-block w-100" alt="...">
                </div>

                <div class="col-md-6 col-sm-12 mb-3 mb-sm-0 secbothimg">
                    <div class="column columnimage">
                    <div class="col-12 aboutss">
                        <img src="{{ asset('frontend/images/imagef2.png') }}" alt="Fabric" class="img-fluid">
                    </div>
                    <div class="col-12 aboutss">
                        <img src="{{ asset('frontend/images/imagef3.png') }}" alt="Fabric" class="img-fluid">
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12 mb-3 mb-sm-0 ">

                <div class="p-3">

                <div class="aboutusHeading">
                    <p class="aboutus">About Us</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the</p>
                </div>

                <div class="aboutusHeadingsec">
                    <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s.

                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                    survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
                    unchanged. It was popularised in the Lorem Ipsum is simply dummy text of the printing and typesetting
                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                    unknown
                    printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                </div>

                <!-- <button class="btn-outline-success maincolor KnowMore" type="submit">Know More</button> -->

                </div>

            </div>

            </div>
        </div>
        
    </div>
@include('web.layouts.footer')
