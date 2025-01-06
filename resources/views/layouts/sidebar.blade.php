<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
  <div class="sidebar-header border-bottom">
    <div class="sidebar-brand bg-light">
      <img src="{{ asset('frontend/images/FT LOGO Ver.3 1.png') }}" width="88" height="32" alt="Logo">
      <!-- <svg class="sidebar-brand-full" width="88" height="32" alt="CoreUI Logo">
        <use xlink:href="{{ asset('assets/brand/coreui.svg#full') }}"></use>
      </svg> -->
      <svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
        <use xlink:href="{{ asset('assets/brand/coreui.svg#signet') }}"></use>
      </svg>
    </div>
    <button class="btn-close d-lg-none" type="button" data-coreui-dismiss="offcanvas" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
  </div>
  <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">
        <svg class="nav-icon">
          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
        </svg> Dashboard</a>
    </li>
    <li class="nav-item mt-1"><a class="nav-link" href="{{ route('admin.customer.index') }}">
        <svg class="nav-icon">
          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
        </svg> Manage Buyers</a>
    </li>
    <li class="nav-item mt-1"><a class="nav-link" href="{{ route('admin.manufacturer.index') }}">
        <svg class="nav-icon">
          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
        </svg> Manage Manufacturer</a>
    </li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-layers') }}"></use>
        </svg> Product Management</a>
      <ul class="nav-group-items compact">
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.category.index') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Category</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.requirement.index') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Requirement</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.subcategory.index') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Subcategory</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.tag.index') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Tag</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.product.index') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Product</a></li>
      </ul>
    </li>
    <li class="nav-item mt-1"><a class="nav-link" href="{{ route('admin.testimonial.index') }}">
        <svg class="nav-icon">
          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-list-rich') }}"></use>
        </svg> Testimonial</a>
    </li>
    <li class="nav-item mt-1"><a class="nav-link" href="{{ route('admin.contact-us.index') }}">
        <svg class="nav-icon">
          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-list-rich') }}"></use>
        </svg> Contact Us</a>
    </li>
  </ul>
</div>