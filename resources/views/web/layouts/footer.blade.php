<footer class="footer">

<div style="margin: 0 3rem;">
    <div class="row">
        <div class="footer-col col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <div class="footerlogo">
                <img src="{{ asset('frontend/images/Footerlogo.png') }}">

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

            <ul>
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
                        <div> mail@ Fabricstree.com</div>

                    </div>

                </div>
            </ul>
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

            <ul>
                <h3>Newsletter</h3>
                <div class="col-md-12 col-sm-12 footerinp">
                    <input type="text" class="form-control" placeholder="Enter your email address">
                    <button class="btn-outline-success maincolor mt-3" type="submit">Subscribe</button>
                </div>
            </ul>

        </div>

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

                @error('pwd')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              <p class="Forgots" data-bs-toggle="modal" data-bs-target="#exampleModalforget">{{ __('Forgot Your Password?') }}</p>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center  ">
              <button class="btn-outline-success maincolor" id="save_login" type="button">{{ __('Submit') }}</button>
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

                <h6 class="mb-4" style="color: #83848A; width: 18rem;">Passwords are case sensitive and must
                    be at least 6
                    characters long
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
        <form method="POST" id="registerform" name="registerform" >
        @csrf  
        @session('success')
            <div class="alert alert-success" role="alert"> 
              {{ $value }}
            </div>
        @endsession
        <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="mb-3">
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

            <div class="col-md-12 col-sm-12">
              <div class="mb-3">
                <!-- <label for="exampleFormControlTextarea1" class="form-label">{{ __('Address') }}*</label> -->
                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" placeholder="Enter your address" rows="3">{{ old('address') }}</textarea>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-md-12 col-sm-12">
              <div class="mb-3">
                <!-- <label for="exampleFormControlInput1" class="form-label">{{ __('New Password') }}</label> -->
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" placeholder="New Password">

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
                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation" placeholder="Confirm Password">
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
            <button class="btn-outline-success maincolor" id="save_register" type="button" >{{ __('Submit') }}</button>
        </div>
        <div class="text-center">
            <p class="newregistation" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal"> Already have an account? <span  style="text-decoration: underline; color: #78239B; font-weight: bold;">Sign in</span>
            </p>
        </div>
        <!-- <div class="modal-footer">
          <button type="submit" class="btn btn-primary w-100 loginbtn">{{ __('Submit') }}</button>
        </div> -->
        </form>
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
    
    $('#save_register').click(function () {               
      $.easyAjax({
        url: "{{ route('customer.register') }}",
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

  var carouselWidth = $(".carousel-inner")[0].scrollWidth;
  var cardWidth = $(".carousel-item").width();

  var scrollPosition = 0;

  $(".carousel-control-next").on("click", function () {
    if (scrollPosition < carouselWidth - cardWidth * 3) {
      console.log("next");
      scrollPosition = scrollPosition + cardWidth;
      $(".carousel-inner").animate({ scrollLeft: scrollPosition }, 800);
    }
  });
  $(".carousel-control-prev").on("click", function () {
    if (scrollPosition > 0) {
      scrollPosition = scrollPosition - cardWidth;
      $(".carousel-inner").animate({ scrollLeft: scrollPosition }, 800);
    }
  });
} else {
  $(multipleItemCarousel).addClass("slide");
}

</script>
@session('success')
<script type="text/javascript">
  $( document ).ready(function() {
      console.log( "ready-3" );
    $('#exampleModalregistation').modal('show');
  });
</script>      
@endsession

@session('error')
<script type="text/javascript">
  $( document ).ready(function() {
      console.log( "ready-2" );
    $('#exampleModal').modal('show');
  });
</script>   
@endsession

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

      
    