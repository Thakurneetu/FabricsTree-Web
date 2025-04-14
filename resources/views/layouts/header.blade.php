<header class="header header-sticky p-0 mb-4">
    <div class="container-fluid border-bottom px-4">
      <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
        <svg class="icon icon-lg">
          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
        </svg>
      </button>
      <ul class="header-nav">
        <li class="nav-item dropdown">
          <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
            <svg class="icon icon-lg theme-icon-active">
              <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-contrast') }}"></use>
            </svg>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.dashboard-theme', 'light') }}">
                <svg class="icon icon-lg me-3">
                  <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-sun') }}"></use>
                </svg>Light
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.dashboard-theme', 'dark') }}">
                <svg class="icon icon-lg me-3">
                  <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-moon') }}"></use>
                </svg>Dark
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item py-1">
          <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
        </li>
        <li class="nav-item dropdown"><a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('frontend/images/avatar.jpg') }}" alt="admin"></div>
          </a>
          <div class="dropdown-menu dropdown-menu-end pt-0">
            <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
              <div class="fw-semibold">Settings</div>
            </div>
            <a class="dropdown-item" href="{{ route('admin.profile') }}">
              <svg class="icon me-2">
                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
              </svg> Profile
            </a>
            <a class="dropdown-item" href="#"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <svg class="icon me-2">
                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
              </svg> Logout
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
        </li>
      </ul>
    </div>
  </header>