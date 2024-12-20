@include('web.layouts.header')
<div class="container">
    <div class="text-center">
        <div class="d-flex justify-content-center">
            <div class="modelimage" style="background-color: #EFE3F4;border: 10px solid #fff">
                <img class="p-3" src="{{ asset('frontend/images/Layer 2.png' )}}" alt="thanks" width="80">
            </div>
        </div>
        <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Edit Profile</h1>
    </div>

    <div class="Maindiv mt-3">


        <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Personal Detail</h1>


        <div class="row">

            <div class="col-md-12 col-sm-12">
                <input type="text" class="form-control" placeholder="Enter your name">
            </div>
            <div class="col-md-6 col-sm-12">
                <input type="text" class="form-control" placeholder="Enter your mobile number">
            </div>
            <div class="col-md-6 col-sm-12">
                <input type="text" class="form-control" placeholder="Enter your email address">
            </div>

            <div class="col-md-6 col-sm-12">
                <input type="text" class="form-control" placeholder="Enter your email address">
            </div>
            <div class="col-md-6 col-sm-12">
                <input type="text" class="form-control" placeholder="Enter your email address">
            </div>

            <div class="col-md-12 col-sm-12">
                <input type="text" class="form-control" placeholder="Enter your email address">
            </div>

        </div>


        <div class="modal-footer d-flex justify-content-center mt-3 ">
            <button class="btn-outline-success maincolor" type="submit">Submit</button>
        </div>


    </div>

    <div class="Maindivtwo mt-5 mb-5">

        <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Change Password</h1>


        <div class="row">
            <div class="col-md-6 col-sm-12">
                <input type="password" class="form-control" placeholder="Enter your password">
            </div>
            <div class="col-md-6 col-sm-12">
                <input type="password" class="form-control" placeholder="Enter your password">
            </div>
        </div>

        <div class="modal-footer d-flex justify-content-center  mt-3">
            <button class="btn-outline-success maincolor" type="submit">Submit</button>
        </div>

    </div>
</div>
@include('web.layouts.footer')
