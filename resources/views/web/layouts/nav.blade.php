<div class="topnav gap-2">
    <p><i class="fa fa-envelope"></i>&nbsp; Fabricstree@gmail.com</p>
    <p><i class="fa fa-truck"></i>&nbsp; Free Shipping World wide for all orders</p>
    <p> <i class="fa fa-phone"></i>&nbsp; +123 456 7890</p>
</div>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="container-fluid" style="justify-content: space-around;">

    <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('frontend/images/FT LOGO Ver.3 1.png') }}" alt="ss" style="width: 11rem;"></a>

    <div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContents" aria-controls="navbarSupportedContents" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContents">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('product.index')}}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('contactus')}}">Contact Us</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
    </div>

    <div class="d-flex justify-content-center gap-2" id="searchmob">

        <form class="d-flex" role="search">
          <div class="searchbar">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input class="form-control me-2" type="search" placeholder="Search...." aria-label="Search"
              style="background-color: #EEF1F6; text-indent: 32px;color: #83848A;">
          </div>
        </form>

        <div class="searchbar">
            @if(Auth::guard('customer')->check())
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">{{@$customer->name}} &nbsp;</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('profile')}}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('product.productcart')}}">My Carts List</a></li>
                    <li><a class="dropdown-item" href="{{ route('product.productquotes')}}">My Quotes List</a></li>
                    <li><a class="dropdown-item" href="{{ route('product.orders')}}">My Orders List</a></li>
                    <li><a class="dropdown-item" href="{{ route('profile')}}">Change Password</a></li>
                    <li><a class="dropdown-item" href="{{ route('customer.logout')}}" >Logout</a></li>
                </ul>
            </div>
            @else
            <i class="fa fa-user" aria-hidden="true" style="color: #78239B;"></i>
            <button class="btn btn-outline-success login" type="submit" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Login</button>
            @endif
        </div>
      </div>

    </div>

    <!-- <div class="d-flex justify-content-center gap-2" id="searchmob">

    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search...." aria-label="Search">
    </form>

    @if(Auth::guard('customer')->check())
    <a href="{{ route('customer.logout')}}" ><button class="btn btn-outline-success login" type="button" >Logout</button></a>
    @else
    <button class="btn btn-outline-success login" type="submit" data-bs-toggle="modal"
        data-bs-target="#exampleModal">Login</button>
    @endif
    

</div> -->
</nav>