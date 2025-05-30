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
        <form method="POST" id="profileform" name="profileform" enctype='multipart/form-data'>
            @csrf
            <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Personal Detail</h1>
            <div class="row">
                <div class="col-md-6 col-sm-12" style="display:none ;">
                    <input type="hidden" class="form-control" placeholder="Enter user type" value="{{ $customer->user_type }}" readonly name="user_type" id="user_type">
                </div>
                @if($customer->user_type=='Customer')
                    <div class="col-md-6 col-sm-12">
                        <input type="text" class="form-control" placeholder="Enter your name" value="{{ $customer->name }}" name="name" id="name">
                    </div>
                @else
                    <div class="col-md-6 col-sm-12">
                        <input type="text" class="form-control" placeholder="Enter store name" value="{{ $customer->firm_name }}" name="store_name" id="store_name" >
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <input type="text" class="form-control" placeholder="Enter manufacturer name" value="{{ $customer->name }}" name="manufacturer_name" id="manufacturer_name">
                    </div>
                @endif
                <div class="col-md-6 col-sm-12">
                    <input type="text" class="form-control" placeholder="Enter your mobile number" value="{{ $customer->phone }}" name="phone" id="phone" readonly>
                </div>
                <div class="col-md-6 col-sm-12">
                    <input type="text" class="form-control" placeholder="Enter your email address" value="{{ $customer->email }}" name="email" id="email" readonly>
                </div>

                @if($customer->user_type=='Manufacturer')
                <div class="col-md-6 col-sm-12">
                    <input type="text" class="form-control" placeholder="Enter GST number" value="{{ $customer->gst_number }}" name="gst_no" id="gst_no" >
                </div>
                <div class="col-md-6 col-sm-12">
                    <input type="text" class="form-control" placeholder="Enter store contact number" value="{{ $customer->store_contact }}" name="store_contact" id="store_contact" >
                </div>
                <!-- <label for="exampleFormControlInput1" class="form-label">{{ __('Store Logo') }}*</label>  -->
                <div class="col-md-6 col-sm-12" >
                <div class="mb-3">
                    <input style="height: 1.8rem;" type="file" name="store_logo" id="store_logo" accept="image/*" class="form-control @error('store_logo') is-invalid @enderror" placeholder="upload store logo" title="{{ __('Store Logo') }}" value="{{ old('store_logo') }}">
                    @error('store_logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                    @if($customer->store_logo)
                    <img class="p-3" src="{{asset($customer->store_logo)}}" alt="store logo" width="150">
                    @else
                    <img class="p-3" src="{{asset('frontend/images/Layer 2.png')}}" alt="store logo" width="150">
                    @endif
                </div>
                @endif

                <div class="col-md-6 col-sm-12">
                    <input type="text" class="form-control" placeholder="Enter your pincode" value="{{ $customer->pincode }}" name="pincode" id="pincode">
                </div>

                @if($customer->user_type=='Manufacturer')
                <div class="col-md-6 col-sm-12">
                <input type="text" class="form-control" placeholder="Enter store address" value="{{ $customer->address }}" name="store_address" id="store_address">
                </div>
                @else
                <div class="col-md-6 col-sm-12">
                    <input type="text" class="form-control" placeholder="Enter your address" value="{{ $customer->address }}" name="address" id="address">
                </div>
                @endif
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
                    <!-- <span class="password-toggle-icon3"><i class="fas fa-eye"></i></span> -->
                </div>
                <div class="col-md-6 col-sm-12">
                    <input type="password" class="form-control" placeholder="Please enter confirm password" name="confirm_password" id="confirm_password">
                    <!-- <span class="password-toggle-icon4"><i class="fas fa-eye"></i></span> -->
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
      
        let form = $('#profileform')[0];
        let formData = new FormData(form);

      $.easyAjax({
        url: "{{ route('customer.updateprofile') }}",
        container: '#profileform',
        type: "POST",
        file: true,
        processData: false,
        contentType: false,
        data: formData,
        enctype: 'multipart/form-data',
        //data: $('#profileform').serialize(),
        success: function(response) {
          if (response.status) {
            swal("Sent!", response.message, "success");
            setInterval(function () {
              window.location.reload();
            }, 2000);
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
            }, 2000);
          }
        }
      })
    });
</script>
