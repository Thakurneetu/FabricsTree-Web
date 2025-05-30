@extends('layouts.app')

@section('content')
  <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card-group d-block d-md-flex row">
            <div class="card col-md-7 p-4 mb-0">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-body-secondary">Sign In to your account</p>
                <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                    </svg></span>
                  <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Email" value="{{ old('email') }}" name="email" required autocomplete="email" autofocus>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="input-group mb-4"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"></use>
                    </svg></span>
                  <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="Password" required autocomplete="current-password">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="input-group mb-4"><span class="input-group-text">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" {{ old('remember') ? 'checked' : '' }} name="remember" id="remember">
                    <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <button class="btn btn-primary px-4" type="submit">Login</button>
                  </div>
                  <div class="col-6 text-end">
                    <a href="{{ route('admin.password.request') }}" class="btn btn-link px-0">Forgot password?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
