<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

<style>

    .badge:after{

        content:attr(value);

        font-size:12px;

        color: #fff;

        background: red;

        border-radius:50%;

        padding: 0 5px;

        position:relative;

        left:-8px;

        top:-10px;

        opacity:0.9;

    }



</style>
<div class="topnav gap-2">
    <p><i class="fa fa-envelope"></i>&nbsp; bloombugsfabric@gmail.com</p>
    <p><i class="fa fa-truck"></i>&nbsp; Free Shipping World wide for all orders</p>
    <p> <i class="fa fa-phone"></i>&nbsp; +91 9650608918</p>
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
    <?php
        use App\Models\Customer;
        use Illuminate\Support\Facades\Auth;
        $id = Auth::guard('customer')->id();
        $customer = Customer::find($id);
        //$data['customer'] = $customer;
       // dd($customer);
    ?>
    <div class="d-flex justify-content-center gap-2" id="searchmob">
    <!-- <i class="fa fa-shopping-bag fa-lg "></i> -->
    @if($customer)
        @if(count($customer->carts)>0)
        <a href="{{ route('product.productcart') }}" ><i class="fa badge fa-lg" style="color:black" value="{{count($customer->carts)}}">&#xf290;</i></a>
        @else
        <a href="{{ route('product.productcart') }}" ><i class="fa badge fa-lg" style="color:black" value="0">&#xf290;</i></a>
        @endif
    @endif

<!-- <i class="fa badge fa-lg" value=8>&#xf07a;</i> -->


        <!-- <form class="d-flex" role="search">
          <div class="searchbar">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input class="form-control me-2" type="search" placeholder="Search...." aria-label="Search"
              style="background-color: #EEF1F6; text-indent: 32px;color: #83848A;">
          </div>
        </form> -->

        
            @if(Auth::guard('customer')->check())
            <div class="dropdown">
                <button style="color: black;background-color: #fff !important;border: 0;" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">{{@$customer->name}} &nbsp;</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('profile')}}"><i class="fas fa-user-alt"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('product.productcart')}}"><i class="fas fa-search-dollar"></i> My Carts</a></li>
                    <li><a class="dropdown-item" href="{{ route('product.productquotes')}}"><i class="fa fa-tasks"></i> My Quotes</a></li>
                    <li><a class="dropdown-item" href="{{ route('product.orders')}}"><i class="fas fa-user-cog"></i> My Orders</a></li>
                    <li><a class="dropdown-item" href="{{ route('profile')}}"><i class="fas fa-tools"></i> Change Password</a></li>
                    <li><a class="dropdown-item" href="{{ route('customer.logout')}}" ><i class="fas fa-sign-out"></i> Logout</a></li>
                </ul>
            </div>
            @else
            <div class="searchbar">
                <i class="fa fa-user" aria-hidden="true" style="color: #78239B;"></i>
                <button class="btn btn-outline-success login" type="submit" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Login</button>
            </div>
            @endif
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