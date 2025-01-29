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
        <form method="POST" id="profileform" name="profileform" >
            @csrf 
            <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Personal Detail</h1>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <input type="text" class="form-control" placeholder="Enter your name" value="{{ $customer->name }}" name="name" id="name">
                </div>
                <div class="col-md-6 col-sm-12">
                    <input type="text" class="form-control" placeholder="Enter your mobile number" value="{{ $customer->phone }}" name="phone" id="phone" readonly>
                </div>
                <div class="col-md-6 col-sm-12">
                    <input type="text" class="form-control" placeholder="Enter your email address" value="{{ $customer->email }}" name="email" id="email" readonly>
                </div>

                <div class="col-md-6 col-sm-12">
                    <input type="text" class="form-control" placeholder="Enter your firm name (optional)" value="{{ $customer->firm_name }}" name="firm_name" id="firm_name" >
                </div>
                <div class="col-md-6 col-sm-12">
                    <input type="text" class="form-control" placeholder="Enter your gst number (optional)" value="{{ $customer->gst_number }}" name="gst_number" id="gst_number" >
                </div>

                <div class="col-md-6 col-sm-12">
                    <input type="text" class="form-control" placeholder="Enter your residential or billing address" value="{{ $customer->address }}" name="address" id="address">
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center mt-3 ">
                <button class="btn-outline-success maincolor" type="button" id="save_profile">Save</button>
            </div>
        </form>
    </div>

    <div class="Maindivtwo mt-5 mb-5">
        <form method="POST" id="changepwdform" name="changepwdform" >
            @csrf 
            <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Change Password</h1>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <input type="hidden" readonly class="form-control" placeholder="Enter email" name="reset_email" id="reset_email" value="{{ $customer->email }}" >
                    <input type="password" class="form-control"  placeholder="Please enter your password" name="new_password" id="new_password">
                </div>
                <div class="col-md-6 col-sm-12">
                    <input type="password" class="form-control" placeholder="Please enter confirm password" name="confirm_password" id="confirm_password">
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center  mt-3">
                <button class="btn-outline-success maincolor" type="button" id="save_chnagepwd">Save</button>
            </div>
        </form>
    </div>
</div>
@include('web.layouts.footer')

<script>
    $('#save_profile').click(function () {               
      $.easyAjax({
        url: "{{ route('customer.updateprofile') }}",
        container: '#profileform',
        type: "POST",
        redirect: true,
        data: $('#profileform').serialize(),
        success: function(response) {
          if (response.status) {
            swal("Sent!", response.message, "success");
            setInterval(function () {
              window.location.reload();
            }, 4000);
          }
        }                    
      })
    });

    $('#save_chnagepwd').click(function () {               
      $.easyAjax({
        url: "{{ route('customer.changepassword') }}",
        container: '#changepwdform',
        type: "POST",
        redirect: true,
        data: $('#changepwdform').serialize(),
        success: function(response) {
          if (response.status) {
            swal("Sent!", response.message, "success");
            setInterval(function () {
              window.location.reload();
            }, 4000);
          }
        }                    
      })
    });
</script>
