<footer class="footer">

<div style="margin: 0 3rem;">
    <div class="row">
        <div class="footer-col col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <div class="footerlogo">
                <!-- <img src="{{ asset('frontend/images/Footerlogo.png') }}"> -->
                <a style="background-color: #fff;padding: 18px 35px 18px 40px;" class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('frontend/images/FT LOGO Ver.3 1.png') }}" alt="ss" style="width: 11rem;"></a>
                <ul>
                    <li>Lorem ipsum is typically a corrupted version of De minibus Bono rum et malform, a
                        1st-century.</a></li>
                    <li><a href="#">Download the mobile app</a></li>

                    <div class="d-flex">
                        <li><a href="#"> <img src="{{ asset('frontend/images/pngwing.com 1.png') }}" alt=""> </a></li>
                        <li><a href="#"> <img src="{{ asset('frontend/images/pngwing.com 2.png') }}" alt=""> </a></li>
                    </div>
                </ul>

            </div>

        </div>
        <div class="footer-col col-lg-3 col-md-6 col-sm-12 col-xs-12"
            style="display: flex;justify-content: center;">

            <ul>
                <h3>Pages</h3>
                <li><a href="#">About us</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Terms & Condition</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="footer-col col-lg-3 col-md-6 col-sm-12 col-xs-12 thirdsecfooter"
            style="display: flex;justify-content: center;">

            <!-- <ul>
                <h3>Contact Us</h3>
                <div>
                    <div class="d-flex" style="align-items: center; color: #fff;">
                        <li class="social-links"><a href="#"
                                style="display: flex; justify-content: center; align-items: center;"><i
                                    class="fa fa-phone"></i>
                            </a></li>
                        <div>+91 8920 392 418</div>
                    </div>
                    <div class="d-flex" style="align-items: center; color: #fff;">
                        <li class="social-links"><a href="#"
                                style="display: flex; justify-content: center; align-items: center;"><i
                                    class="fa fa-envelope"></i></a></li>
                        <div> mail@fabricstree.com</div>

                    </div>

                </div>
            </ul> -->
        </div>
        <div class="footer-col col-lg-3 col-md-6 col-sm-12 col-xs-12">


            <ul>
                <h3>Social Media</h3>
                <div class="social-links gap-5">
                    <a href="#"><i style="line-height: 2.5;" class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i style="line-height: 2.5;" class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i style="line-height: 2.5;" class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#"><i style="line-height: 2.5;" class="fa-brands fa-youtube"></i></a>
                    <a href="#"><i style="line-height: 2.5;" class="fa-brands fa-x-twitter"></i></a>
                </div>
            </ul>

            <!-- <ul>
                <h3>Newsletter</h3>
                <div class="col-md-12 col-sm-12 footerinp">
                    <input type="text" class="form-control" placeholder="Enter your email address">
                    <button class="btn-outline-success maincolor mt-3" type="submit">Subscribe</button>
                </div>
            </ul> -->

        </div>
        <hr>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;margin-bottom: -50px;padding-top: 15px;color:#fff">
          <p>© 2024 | All Rights Reserved | Powered by Fabrics Tree
          <!-- <a href="mailto:hege@example.com">hege@example.com</a></p> -->
        </div >
    </div>
</div>
</footer>


  <!-- Modal Log in-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <div class="text-center w-100">
            <!-- <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">{{ __('Login In') }}</h1> -->
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="d-flex justify-content-center" style="margin-top: -6rem;">
            <div class="modelimage" style="background-color: #EFE3F4;border: 10px solid #fff">
                <img class="p-3" src="{{ asset('frontend/images/Layer 2.png') }}" alt="thanks" width="80">
            </div>
        </div>
        <div class="d-flex justify-content-center w-100  mb-3">
            <div class="text-center verify">
                <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Sign In</h1>
            </div>
        </div>
        <!-- action="{{ route('customer.login') }}" -->
        <form method="POST" id="loginfrom" name="loginfrom">
          @csrf
          @session('error')
              <div class="alert alert-danger" role="alert"> 
                  {{ $value }}
              </div>
          @endsession
          <div class="row">
            <div class="mb-3">
              <!-- <label for="exampleFormControlInput1" class="form-label">{{ __('Email') }}*</label> -->
              <input id="email_id" type="email" class="form-control @error('email_id') is-invalid @enderror" name="email_id" value="{{ old('email_id') }}" required autocomplete="email_id" placeholder="Enter your email">

                @error('email_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
              <!-- <label for="exampleFormControlInput1" class="form-label">{{ __('Password') }}*</label> -->
              <input id="pwd" type="password" class="form-control @error('pwd') is-invalid @enderror" name="pwd" required autocomplete="password" placeholder="Please enter password">
              <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
                @error('pwd')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              <p class="Forgots" data-bs-toggle="modal" data-bs-target="#exampleModalforget">{{ __('Forgot Your Password?') }}</p>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center  ">
              <button class="btn-outline-success maincolor" id="save_login" type="button">{{ __('Sign In') }}</button>
          </div>
          <div class="text-center">
              <p class="newregistation mb-3" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModalregistation">
                  Don't have an account? <span
                      style="text-decoration: underline; color: #78239B; font-weight: bold;">{{ __('Sign Up') }}</span>
              </p>
          </div>
          
          <!-- <div class="modal-footer">
            <button type="submit" class="btn btn-primary w-100 loginbtn">{{ __('Sign in') }}</button>
            <div class="text-center w-100">
              <p class="newregistation" type="submit" data-bs-toggle="modal"
            data-bs-target="#exampleModalregistation">{{ __('New Here? Registration') }} </p>
              
            </div>
          </div> -->
        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Forgot Password-->
  <div class="modal fade" id="exampleModalforget" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <div class="text-center w-100">
            <!-- <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Forgot Password</h1> -->
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="d-flex justify-content-center" style="margin-top: -6rem;">
            <div class="modelimage" style="background-color: #EFE3F4;border: 10px solid #fff">
                <img class="p-3" src="{{ asset('frontend/images/Group.png') }}" alt="thanks" width="80">
            </div>
        </div>
        <div class="d-flex justify-content-center w-100  mb-3">
            <div class="text-center verify">
                <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Forgot Password</h1>
            </div>
        </div>
        <!-- action="{{ route('customer.forgetpassword') }}" -->
          <form method="POST" id="forgotpwdform" name="forgotpwdform" >
          @csrf
          <div class="row">
            <div class="mb-3">
              <!-- <label for="exampleFormControlInput1" class="form-label">Email</label> -->
              <input id="email_address" type="email" class="form-control @error('email_address') is-invalid @enderror" name="email_address" value="{{ old('email_address') }}" required autocomplete="email_address" placeholder="Enter your email address">

              @error('email_address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <p style="display: none;" class="hide" data-bs-toggle="modal" data-bs-target="#exampleModalverify">Forgot verify</p>

            </div>
          </div>
          <!-- <div class="modal-footer">
            <button type="submit" class="btn btn-primary w-100 loginbtn">Submit</button>

          </div> -->
          <div class="modal-footer d-flex justify-content-center  ">
                <button class="btn-outline-success maincolor" id="save_forgotpwd" type="button">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Verify Account-->
  <div class="modal fade" id="exampleModalverify" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <div class="text-center w-100">
                  </div>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body verify">

                  <div class="d-flex justify-content-center" style="margin-top: -6rem;">
                      <div class="modelimage" style="background-color: #EFE3F4;border: 10px solid #fff">
                          <img class="p-2" src="{{ asset('frontend/images/Vector (1).png') }}" alt="thanks" width="80">
                      </div>
                  </div>
                  <div class="d-flex justify-content-center w-100">
                      <div class="text-center verify">
                          <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Verify Account</h1>
                          <h6 class="mb-4" style="color: #83848A; width: 20rem;">Verify your account by entering
                              verification code
                          </h6>
                      </div>
                  </div>

                  <form method="POST" id="forgotpwdverifyform" name="forgotpwdverifyform" >
                  @csrf
                      <div class="flex mb-6">
                          <input type="hidden" readonly name="email_otp" id="email_otp"/>
                          <input type="text" class="form-control" name="otp" id="otp" maxlength="4" minlength="4" onkeypress="return onlyNumbers(event)"/>
                          <!-- <input type="text" name="otp[]" maxlength="1" />
                          <input type="text" name="otp[]" maxlength="1" />
                          <input type="text" name="otp[]" maxlength="1" /> -->
                      </div>
                      <p style="margin: unset;"><a href="#" id="resend_btn">Resend</a></p>
                  </form>
              </div>
              <div class="modal-footer d-flex justify-content-center  ">
                  <button class="btn-outline-success maincolor" id="save_forgotpwd_verify" type="button">Submit</button>
              </div>

          </div>
      </div>
  </div>

    <!-- Modal Forgot New & confirm Password-->
  <div class="modal fade" id="exampleModalforgetnew" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <div class="text-center w-100">
            <!-- <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Forgot Password</h1> -->
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="d-flex justify-content-center" style="margin-top: -6rem;">
            <div class="modelimage" style="background-color: #EFE3F4;border: 10px solid #fff">
                <img class="p-3" src="{{ asset('frontend/images/Group.png') }}" alt="thanks" width="80">
            </div>
        </div>
        <div class="d-flex justify-content-center w-100">
            <div class="text-center verify">
                <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Reset Password</h1>

                <h6 class="mb-4" style="color: #83848A; width: 18rem;">Passwords are must be at least 8 characters long
                </h6>
            </div>
        </div>
        <!-- action="{{ route('customer.resetpassword') }}" -->
          <form method="POST" name="resetpasswordform" id="resetpasswordform" >
          @csrf
          <div class="row">
            <div class="mb-3">
              <!-- <label for="exampleFormControlInput1" class="form-label">New Password</label> -->
              <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password"  autocomplete="new_password" placeholder="Enter your new password">
              <span class="password-toggle-icon3"><i class="fas fa-eye"></i></span>
              <input id="reset_email" readonly type="hidden" class="form-control" name="reset_email" required autocomplete="reset_email" placeholder="Email" value="">
                @error('new_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
              <!-- <label for="exampleFormControlInput1" class="form-label">Confirm Password</label> -->
              <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password"  autocomplete="confirm_password" placeholder="Enter your confirm password">
              <span class="password-toggle-icon4"><i class="fas fa-eye"></i></span>
                @error('confirm_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center  ">
              <button class="btn-outline-success maincolor" id="save_reset_password" type="button">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Registration From-->
  <div class="modal fade" id="exampleModalregistation" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <div class="text-center w-100">
            <!-- <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">{{ __('Registration') }}</h1> -->
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="d-flex justify-content-center" style="margin-top: -6rem;">
            <div class="modelimage" style="background-color: #EFE3F4;border: 10px solid #fff">
                <img class="p-3" src="{{ asset('frontend/images/Layer 2.png') }}" alt="thanks" width="80">
            </div>
        </div>
        <div class="d-flex justify-content-center w-100  mb-3">
            <div class="text-center verify">
                <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Sign Up</h1>
            </div>
        </div>
        
        <!-- action="{{ route('customer.register') }}" -->
        <form method="POST" id="registerform" name="registerform" enctype='multipart/form-data'>
        @csrf  
        
        <div class="row">
            <div class="col-md-12 col-sm-12">
            <div class="mb-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input user_type" type="radio" name="user_type" id="user_type1" value="Customer" checked>
                <label class="form-check-label" for="user_type1" >As a Customer</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input user_type" type="radio" name="user_type" id="user_type2" value="Manufacturer">
                <label class="form-check-label" for="user_type2">As a Manufacturer</label>
              </div>
            </div>
            </div>
              <div class="mb-3 cust">
                <!-- <label for="exampleFormControlInput1" class="form-label">{{ __('Full Name') }}*</label> -->
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="fullname" autofocus placeholder="Enter your name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if ($errors->has('name'))
                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                @endif
              </div>
              <div class="mb-3 manuf">
                <!-- <label for="exampleFormControlInput1" class="form-label">{{ __('Store Name') }}*</label> -->
                <input id="store_name" type="text" class="form-control @error('store_name') is-invalid @enderror" name="store_name" value="{{ old('store_name') }}" required autofocus placeholder="Enter store name">
                @error('store_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if ($errors->has('store_name'))
                    <span class="invalid-feedback">{{ $errors->first('store_name') }}</span>
                @endif
              </div>
              <div class="mb-3 manuf">
                <!-- <label for="exampleFormControlInput1" class="form-label">{{ __('Manufacturer Name') }}*</label> -->
                <input id="manufacturer_name" type="text" class="form-control @error('manufacturer_name') is-invalid @enderror" name="manufacturer_name" value="{{ old('manufacturer_name') }}" required autofocus placeholder="Enter manufacturer name">
                @error('manufacturer_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if ($errors->has('manufacturer_name'))
                    <span class="invalid-feedback">{{ $errors->first('manufacturer_name') }}</span>
                @endif
              </div>
            </div>

            <div class="col-md-12 col-sm-12">
              <div class="mb-3">
                <!-- <label for="exampleFormControlInput1" class="form-label">{{ __('Email Id') }}*</label> -->
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-md-12 col-sm-12">
              <div class="mb-3">
                <!-- <label for="exampleFormControlInput1" class="form-label">{{ __('Mobile Number') }}*</label> -->
                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Enter your mobile number">

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-md-12 col-sm-12 manuf" >
              <div class="mb-3">
                <!-- <label for="exampleFormControlInput1" class="form-label">{{ __('Store Contact Number') }}*</label> -->
                <input id="store_contact" type="number" class="form-control @error('store_contact') is-invalid @enderror" name="store_contact" value="{{ old('store_contact') }}" required placeholder="Enter store contact number">

                @error('store_contact')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <!-- <label for="exampleFormControlInput1" class="form-label">{{ __('Store Logo') }}*</label> -->
            <!-- <div class="col-md-12 col-sm-12 manuf" >
              <div class="mb-3">
                
                <input id="store_image" type="hidden" class="form-control"  name="store_image" value="" placeholder="upload store image">

                <input id="store_logo" type="file" class="form-control @error('store_logo') is-invalid @enderror" name="store_logo" value="{{ old('store_logo') }}" required placeholder="upload store logo">

                @error('store_logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div> -->

            <div class="col-md-12 col-sm-12 cust">
              <div class="mb-3">
                <!-- <label for="exampleFormControlTextarea1" class="form-label">{{ __('Address') }}*</label> -->
                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" placeholder="Enter address" rows="3">{{ old('address') }}</textarea>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-md-12 col-sm-12 manuf">
              <div class="mb-3">
                <!-- <label for="exampleFormControlTextarea1" class="form-label">{{ __('Address') }}*</label> -->
                <textarea id="store_address" class="form-control @error('store_address') is-invalid @enderror" name="store_address" required placeholder="Enter store address" rows="3">{{ old('store_address') }}</textarea>
                @error('store_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-md-12 col-sm-12 manuf">
              <div class="mb-3">
                <!-- <label for="exampleFormControlTextarea1" class="form-label">{{ __('Pincode') }}*</label> -->
                <input type="text" id="gst_no" class="form-control @error('gst_no') is-invalid @enderror" name="gst_no" required placeholder="Enter GST number" value="{{ old('gst_no') }}">
                @error('gst_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-md-12 col-sm-12">
              <div class="mb-3">
                <!-- <label for="exampleFormControlTextarea1" class="form-label">{{ __('Pincode') }}*</label> -->
                <input type="text" id="pincode" class="form-control @error('pincode') is-invalid @enderror" name="pincode" required placeholder="Enter pincode" value="{{ old('pincode') }}">
                @error('pincode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-md-12 col-sm-12">
              <div class="mb-3">
                <!-- <label for="exampleFormControlInput1" class="form-label">{{ __('New Password') }}</label> -->
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" placeholder="New password">
                <span class="password-toggle-icon1"><i class="fas fa-eye"></i></span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-md-12 col-sm-12">
              <div class="mb-3">
                <!-- <label for="exampleFormControlInput1" class="form-label">{{ __('Confirm Password') }}</label> -->
                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation" placeholder="Confirm password">
                <span class="password-toggle-icon2"><i class="fas fa-eye"></i></span>
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            
            <!-- <div class="text-center w-100">
              <p class="newregistation" type="submit" data-bs-toggle="modal"
            data-bs-target="#exampleModal">{{ __('Already have an account? Sign in') }}</p>
              
            </div> -->


        </div>
        <div class="modal-footer d-flex justify-content-center  ">
            <button class="btn-outline-success maincolor" id="save_register" type="button" >{{ __('Sign Up') }}</button>
        </div>
        <div class="text-center">
            <p class="newregistation" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal"> Already have an account? <span  style="text-decoration: underline; color: #78239B; font-weight: bold;">Sign In</span>
            </p>
        </div>
        <!-- <div class="modal-footer">
          <button type="submit" class="btn btn-primary w-100 loginbtn">{{ __('Submit') }}</button>
        </div> -->
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Thanku for interest-->
  <div class="modal fade login" id="exampleModalThankuinterest" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">

                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" style="padding: 20px 6rem;">

                  <div class="d-flex justify-content-center" style="margin-top: -6rem;">
                      <div class="modelimage" style="background-color: #EFE3F4;border: 10px solid #fff">
                          <img class="p-2" src="{{ asset('frontend/images/thanks.png') }}" alt="thanks" width="80">
                      </div>
                  </div>

                  <div class="text-center w-100 verify">
                      <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Thank you for your interest!
                      </h1>

                      <h6 class="mb-4" style="color: #83848A;">we have received request. One of our experts will reach
                          out to you in 24 hours.
                      </h6>
                  </div>

                  <div class="p-2 text-center" style="background-color: #EEF1F6;border-radius: 5px;">
                      <span>For urgent requests, please call us on</span>
                      <h6 class="mt-1" style="color: #78239B;font-weight: bold;">+91 8920 392 418</h6>
                  </div>

              </div>


          </div>
      </div>
  </div>

  <!-- Modal Revoke Quote-->
  <div class="modal fade login" id="exampleModalRevokeQuote" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">

                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div style="padding: 20px 6rem;">

                      <div class="d-flex justify-content-center" style="margin-top: -6rem;">
                          <div class="modelimage" style="background-color: #EFE3F4;border: 10px solid #fff">
                              <img class="p-2" src="{{ asset('frontend/images/Group 56622.png') }}" alt="thanks" width="80">
                          </div>
                      </div>

                      <div class="text-center w-100 verify">
                          <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Revoke Quote
                          </h1>

                          <h6 class="mb-4" style="color: #83848A;">Select a reason for closure
                          </h6>
                      </div>
                  </div>
                  <form method="POST" name="revoke_form" id="revoke_form" >
                    @csrf
                    <div class="p-4">
                        <div class="form-check mt-3">
                            <input type="hidden" name="enquiry_id" id="enquiry_id" value=""/>
                            <input class="form-check-input" type="radio" name="revoke_reason" id="flexRadioDefault11" value="Incorrect Quality Requested">
                            <label class="form-check-label" for="flexRadioDefault11">
                                Incorrect Quality Requested
                            </label>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="radio" name="revoke_reason" id="flexRadioDefault22"
                                checked value="Fabric is no Longer Required">
                            <label class="form-check-label" for="flexRadioDefault22">
                                Fabric is no Longer Required
                            </label>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="radio" name="revoke_reason" id="flexRadioDefault33"
                                checked value="Others">
                            <label class="form-check-label" for="flexRadioDefault33">
                                Others
                            </label>
                        </div>

                        <div class="mt-3 p-2"
                            style="background-color: #d6d9e0;border-radius: 5px; border-left: 4px solid forestgreen;">
                            <span>Once closed. This cannot be reopened, are you sure?</span>
                        </div>
                        @error('revoke_reason')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="modal-footer d-flex justify-content-center  ">
                        <button class="btn-outline-success maincolor" type="button" id="submit_revoke_quote">Submit</button>
                    </div>
                  </form>
              </div>


          </div>
      </div>
  </div>

  <!-- Modal Revoke Order-->
  <div class="modal fade login" id="exampleModalRevokeOrder" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">

                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div style="padding: 20px 6rem;">

                      <div class="d-flex justify-content-center" style="margin-top: -6rem;">
                          <div class="modelimage" style="background-color: #EFE3F4;border: 10px solid #fff">
                              <img class="p-2" src="{{ asset('frontend/images/Group 56622.png') }}" alt="thanks" width="80">
                          </div>
                      </div>

                      <div class="text-center w-100 verify">
                          <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Revoke Order
                          </h1>

                          <h6 class="mb-4" style="color: #83848A;">Select a reason for closure
                          </h6>
                      </div>
                  </div>
                  <form method="POST" name="revoke_order_form" id="revoke_order_form" >
                    @csrf
                    <div class="p-4">
                        <div class="form-check mt-3">
                            <input type="hidden" name="order_id" id="order_id" value=""/>
                            <input class="form-check-input" type="radio" name="revoke_reason" id="flexRadioDefault11" value="Incorrect Quality Requested">
                            <label class="form-check-label" for="flexRadioDefault11">
                            Incorrect Quality Requested
                            </label>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="radio" name="revoke_reason" id="flexRadioDefault22"
                                checked value="Fabric is no Longer Required">
                            <label class="form-check-label" for="flexRadioDefault22">
                            Fabric is no Longer Required
                            </label>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="radio" name="revoke_reason" id="flexRadioDefault33"
                                checked value="Others">
                            <label class="form-check-label" for="flexRadioDefault33">
                                Others
                            </label>
                        </div>

                        <div class="mt-3 p-2"
                            style="background-color: #d6d9e0;border-radius: 5px; border-left: 4px solid forestgreen;">
                            <span>Once closed. This cannot be reopened, are you sure?</span>
                        </div>
                        @error('revoke_reason')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="modal-footer d-flex justify-content-center  ">
                        <button class="btn-outline-success maincolor" type="button" id="submit_revoke_order">Submit</button>
                    </div>
                  </form>
              </div>


          </div>
      </div>
  </div>

    <!-- Modal upload quote -->
    <div class="modal fade login" id="exampleModalUploadQuote" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">

                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div style="padding: 20px 6rem;">

                      <div class="d-flex justify-content-center" style="margin-top: -6rem;">
                          <div class="modelimage" style="background-color: #EFE3F4;border: 10px solid #fff">
                              <img class="p-2" src="{{ asset('frontend/images/Group 56622.png') }}" alt="thanks" width="80">
                          </div>
                      </div>

                      <div class="text-center w-100 verify">
                          <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Upload Quote
                          </h1>

                      </div>
                  </div>
                  <form method="POST" name="upload_form" id="upload_form" action="{{ route('product.uploadquotes') }}" enctype="multipart/form-data" >
                    @csrf
                    <div class="p-4">
                        <div class="">
                            <label class="form-label" for="flexRadioDefault11">
                                Upload Quatation File:
                            </label>
                            <input type="hidden" name="upload_enquiry_id" id="upload_enquiry_id" value=""/>
                            <input required class="form-control" type="file" name="upload_quatation" id="upload_quatation" value="">
                        </div>
                        @error('upload_quatation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="modal-footer d-flex justify-content-center  ">
                        <button class="btn-outline-success maincolor" type="submit" id="submit_upload_quatation">Submit</button>
                    </div>
                  </form>
              </div>


          </div>
      </div>
  </div>

  <!--<div class="loader"></div>-->
  <a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
        <i class="stack-interface stack-up-open-big"></i>
  </a>
  
<link rel="stylesheet" href="{{asset('frontend/css/helper.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/sweetalert.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/jquery.toast.css')}}">
<script src="{{asset('frontend/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('frontend/js/smooth-scroll.min.js')}}"></script>
<script src="{{asset('frontend/js/helper.js')}}"></script>
<script src="{{asset('frontend/js/jquery.toast.js')}}"></script>
<script src="{{asset('frontend/js/sweetalert.min.js')}}"></script>
<script>
    function onlyNumbers(e)
    {
      var c=e.which?e.which:e.keyCode; 
      if(c<48||c>57)
      {
        return false;
      }
    }

    $( document ).ready(function() {
      $('.manuf').hide();
    });

    $('.user_type').click(function () { 
      var val = $(this).val();
      if(val=='Customer'){
        $('.cust').show();
        $('.manuf').hide();
      }else{
        $('.cust').hide();
        $('.manuf').show();
      }
    });

    $("#store_logo1").on('change',function(){
      //$('#registerform').submit();
      var fd = new FormData();
      var files = $('#store_logo')[0].files[0];
      fd.append('store_logo',files);
      // var token = "{{ csrf_token() }}";alert(token +"  ====  "+ $("input[name='_token']").val())
        console.log('fd',fd);
        $.easyAjax({
            dataType: 'json',
            processData: false,
            container: '#registerform',
            redirect: true,
            
           // contentType: 'application/json',
            url: "{{ route('customer.uploadstorelogo') }}",
            type: 'POST',
            data: { 'token': $("input[name='_token']").val(),'logo':fd },
            success: function(response){
              //console.log(response);
                // if(response != 0){
                //     $("#img").attr("src",response); 
                //     $(".preview img").show(); // Display image element
                // }else{
                //     alert('file not uploaded');
                // }
            },
        });
    });
    
    $('#save_register').click(function () {  
      
        // let uploadedFile = document.getElementById('store_logo').files[0];
        // console.log('formData:',uploadedFile);
        // $('#store_image').val(uploadedFile.name);

      $.easyAjax({
        url: "{{ route('customer.register') }}",
        enctype: 'multipart/form-data',
        container: '#registerform',
        type: "POST",
        redirect: true,
        data: $('#registerform').serialize(),
        success: function(response) {
          if (response.status) {
            $('#exampleModalregistation').modal('hide');
            swal("Sent!", response.message, "success");
            setInterval(function () {
              window.location.reload();
            }, 4000);
          }
        }                    
      })
    });

    $('#save_login').click(function () {               
      $.easyAjax({
        url: "{{ route('customer.login') }}",
        container: '#loginfrom',
        type: "POST",
        redirect: true,
        data: $('#loginfrom').serialize(),
        success: function(response) {
          if (response.status) {
            $('#exampleModal').modal('hide');
            swal("Sent!", response.message, "success");
            setInterval(function () {
              window.location.assign('{{ route("profile");}} ');
            }, 2000);
          }
        }                    
      })
    });

    $('#save_forgotpwd').click(function () {               
      $.easyAjax({
        url: "{{ route('customer.forgetpassword') }}",
        container: '#forgotpwdform',
        type: "POST",
        redirect: true,
        data: $('#forgotpwdform').serialize(),
        success: function(response) {
          if (response.status) {
            $('#exampleModalforget').modal('hide');
            swal("Sent!", response.message, "success");
            $('#email_otp').val(response.data.email);
            $('#exampleModalverify').modal('show');
          }
        }                    
      })
    });

    $('#resend_btn').click(function () {               
      $.easyAjax({
        url: "{{ route('customer.resent_otp') }}",
        container: '#forgotpwdverifyform',
        type: "POST",
        redirect: true,
        data: $('#forgotpwdverifyform').serialize(),
        success: function(response) {
          if (response.status) {
            swal("Sent!", response.message, "success");
          }
        }                    
      })
    });

    $('#save_forgotpwd_verify').click(function () {               
      $.easyAjax({
        url: "{{ route('customer.forgototpverify') }}",
        container: '#forgotpwdverifyform',
        type: "POST",
        redirect: true,
        data: $('#forgotpwdverifyform').serialize(),
        success: function(response) {
          if (response.status) {
            $('#exampleModalverify').modal('hide');
            swal("Sent!", response.message, "success");
            $('#reset_email').val(response.data.email);
            $('#exampleModalforgetnew').modal('show');
          }
        }                    
      })
    });

    $('#save_reset_password').click(function () {               
      $.easyAjax({
        url: "{{ route('customer.resetpassword') }}",
        container: '#resetpasswordform',
        type: "POST",
        redirect: true,
        data: $('#resetpasswordform').serialize(),
        success: function(response) {
          if (response.status) {
            $('#exampleModalforgetnew').modal('hide');
            swal("Sent!", response.message, "success");
            setInterval(function () {
              window.location.assign('/');
            }, 2000);
          }
        }                    
      })
    });

    $('#save_contactus').click(function () {               
      $.easyAjax({
        url: "{{ route('save.contactus') }}",
        container: '#contactForm',
        type: "POST",
        redirect: true,
        data: $('#contactForm').serialize(),
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

    function add_to_cart(product_id,quantity=1,msg='') {   
  
      var color_code = '';
      $.easyAjax({
        url: "{{ route('product.addtocart') }}",
        //type: "POST",
        data: {'product_id':product_id,'quantity':quantity,'color_code':color_code},
        success: function(response) {
          if (response.status) {
            var items_count =  $('#items_count').attr('value');
            //alert(items_count);
            if(msg=='minus'){
              var itemQty = parseInt(items_count)  - parseInt(quantity);
              swal("Sent!", 'Product removed successfully.', "success");
            }else{
              var itemQty = parseInt(items_count) + parseInt(quantity);
              swal("Sent!", response.message, "success");
            }

            $('#'+'add_to_cart_'+product_id).hide();
            $('#'+'go_to_cart_'+product_id).show();

            $('.add_to_cart_'+product_id).hide();
            $('.go_to_cart_'+product_id).show();

            
            $('#items_count').attr('value',itemQty);
           
          }else{
            swal("Error!", response.message, "error");
            $('#exampleModal').modal('show');
          }
        }                    
      })
    }

   
    $('.delete_cart').click(function () {
      if (confirm("Are you sure want to delete this cart item?") == true) {  
      var cart_id = $(this).attr('cartid');
      $.easyAjax({
        url: "{{ route('product.deletecart') }}",
        //type: "POST",
        data: {'cart_id':cart_id},
        success: function(response) {
          if (response.status) {
            swal("Sent!", response.message, "success");
            setInterval(function () {
              window.location.reload();
            }, 1000);
          }
        }                    
      })
      }else{
        return false;
      }
    });

    $('#submit_revoke_quote').click(function () {
      if (confirm("Are you sure want to revoke this request quote?") == true) {  
        $.easyAjax({
            url: "{{ route('product.requestaquotesrevoke') }}",
            container: '#revoke_form',
            type: "POST",
            redirect: true,
            data: $('#revoke_form').serialize(),
            success: function(response) {
            if (response.status) {
                
                swal("Sent!", response.message, "success");
                setInterval(function () {
                    window.location.assign('{{ route("product.productquotes");}} ');
                }, 3000);
            }
            }                    
        })
      }else{
        return false;
      }
    });


    $('#submit_revoke_order').click(function () {
      if (confirm("Are you sure want to revoke this order?") == true) {  
        $.easyAjax({
            url: "{{ route('product.revokeorder') }}",
            container: '#revoke_order_form',
            type: "POST",
            redirect: true,
            data: $('#revoke_order_form').serialize(),
            success: function(response) {
            if (response.status) {
                
                swal("Sent!", response.message, "success");
                setInterval(function () {
                    window.location.assign('{{ route("product.orders");}} ');
                }, 3000);
            }
            }                    
        })
      }else{
        return false;
      }
    });

    $('.submit_accept_quotes').click(function () {
      if (confirm("Are you sure want to accept this invoice quote?") == true) {  
        $.easyAjax({
            url: "{{ route('product.acceptquotes') }}",
           // type: "POST",
            //container: '#accept_form',
            //redirect: true,
            data: {'enquiryid':$(this).attr('enquiryid')},
            success: function(response) {
            if (response.status) {
                
                swal("Sent!", response.message, "success");
                setInterval(function () {
                    window.location.assign('{{ route("product.productquotes");}} ');
                }, 3000);
            }
            }                    
        })
      }else{
        return false;
      }
    });
          
  productScroll();
  function productScroll() {
    let slider = document.getElementById("slider");
    let next = document.getElementsByClassName("pro-next")[0];
    let prev = document.getElementsByClassName("pro-prev")[0];
    let slide = document.getElementById("slide");
    let items = slide.getElementsByClassName("item");

    let position = 0; // Initialize position outside of event listeners

    prev.addEventListener("click", function () {
      if (position > 0) {
        position -= 1;
        translateX(position); //translate items
      }
    });

    next.addEventListener("click", function () {
      if (position < hiddenItems()) {
        position += 1;
        translateX(position); //translate items
      }
    });

    function hiddenItems() {
      // Get hidden items
      return items.length - Math.floor(slider.offsetWidth / 210);
    }

    function translateX(position) {
      // Translate items
      slide.style.transform = `translateX(${position * -210}px)`;
    }
  }
</script>
<script>
  const multipleItemCarousel = document.querySelector("#testimonialCarousel");

if (window.matchMedia("(min-width:576px)").matches) {
  const carousel = new bootstrap.Carousel(multipleItemCarousel, {
    interval: false
  });

  var carouselWidth = $(".carousel-inner1")[0].scrollWidth;
  var cardWidth = $(".carousel-item1").width();

  var scrollPosition = 0;

  $(".carousel-control-next").on("click", function () {
    if (scrollPosition < carouselWidth - cardWidth * 3) {
      console.log("next");
      scrollPosition = scrollPosition + cardWidth+58;
      $(".carousel-inner1").animate({ scrollLeft: scrollPosition }, 400);
    }
  });
  $(".carousel-control-prev").on("click", function () {
    if (scrollPosition > 0) {
      scrollPosition = scrollPosition - cardWidth-58;
      $(".carousel-inner1").animate({ scrollLeft: scrollPosition }, 400);
    }
  });
} else {
  $(multipleItemCarousel).addClass("slide");
}

</script>
<!-- @if(!$customer)
@session('success')
<script type="text/javascript">
  $( document ).ready(function() {
      console.log( "ready-3" );
    //$('#exampleModalregistation').modal('show');
  });
</script>      
@endsession
@endif -->

@session('error')
<script type="text/javascript">
  $( document ).ready(function() {
      console.log( "ready-2" );
    $('#exampleModal').modal('show');
  });
</script>   
@endsession
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
<script>
    //For login
    const passwordField = document.getElementById("pwd");
    const togglePassword = document.querySelector(".password-toggle-icon i");

    togglePassword.addEventListener("click", function () {
      if (passwordField.type === "password") {
        passwordField.type = "text";
        togglePassword.classList.remove("fa-eye");
        togglePassword.classList.add("fa-eye-slash");
      } else {
        passwordField.type = "password";
        togglePassword.classList.remove("fa-eye-slash");
        togglePassword.classList.add("fa-eye");
      }
    });

    //For new passowrd
    const passwordField1 = document.getElementById("password");
    const togglePassword1 = document.querySelector(".password-toggle-icon1 i");

    togglePassword1.addEventListener("click", function () {
      if (passwordField1.type === "password") {
        passwordField1.type = "text";
        togglePassword1.classList.remove("fa-eye");
        togglePassword1.classList.add("fa-eye-slash");
      } else {
        passwordField1.type = "password";
        togglePassword1.classList.remove("fa-eye-slash");
        togglePassword1.classList.add("fa-eye");
      }
    });

    //for confirm passowrd
    const passwordField2 = document.getElementById("password_confirmation");
    const togglePassword2 = document.querySelector(".password-toggle-icon2 i");

    togglePassword2.addEventListener("click", function () {
      if (passwordField2.type === "password") {
        passwordField2.type = "text";
        togglePassword2.classList.remove("fa-eye");
        togglePassword2.classList.add("fa-eye-slash");
      } else {
        passwordField2.type = "password";
        togglePassword2.classList.remove("fa-eye-slash");
        togglePassword2.classList.add("fa-eye");
      }
    });


    //for reset form new_password
    const passwordField3 = document.getElementById("new_password");
    const togglePassword3 = document.querySelector(".password-toggle-icon3 i");

    togglePassword3.addEventListener("click", function () {
      if (passwordField3.type === "password") {
        passwordField3.type = "text";
        togglePassword3.classList.remove("fa-eye");
        togglePassword3.classList.add("fa-eye-slash");
      } else {
        passwordField3.type = "password";
        togglePassword3.classList.remove("fa-eye-slash");
        togglePassword3.classList.add("fa-eye");
      }
    });


    //for reset form confirm_password
    const passwordField4 = document.getElementById("confirm_password");
    const togglePassword4 = document.querySelector(".password-toggle-icon4 i");

    togglePassword4.addEventListener("click", function () {
      if (passwordField4.type === "password") {
        passwordField4.type = "text";
        togglePassword4.classList.remove("fa-eye");
        togglePassword4.classList.add("fa-eye-slash");
      } else {
        passwordField4.type = "password";
        togglePassword4.classList.remove("fa-eye-slash");
        togglePassword4.classList.add("fa-eye");
      }
    });
</script>