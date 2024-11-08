<!DOCTYPE html><!--
* CoreUI - Free Bootstrap Admin Template
* @version v5.1.1
* @link https://coreui.io/product/free-bootstrap-admin-template/
* Copyright (c) 2024 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
-->
<html lang="en" data-coreui-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Fabrics Tree') }}</title>
    <meta name="theme-color" content="#000000">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{url('vendors/simplebar/css/simplebar.css')}}">
    <link rel="stylesheet" href="{{url('css/vendors/simplebar.css')}}">
    <!-- Main styles for this application-->
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    @yield('style')
  </head>
  <body>

    @yield('content')
    <!-- CoreUI and necessary plugins-->
    <script src="{{url('vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
    <script src="{{url('vendors/simplebar/js/simplebar.min.js')}}"></script>
    <script>
      const header = document.querySelector('header.header');

      document.addEventListener('scroll', () => {
        if (header) {
          header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
      });
    </script>
    @yield('script')
  </body>
</html>