<div class="topnav gap-2">
<p><i class="fa fa-envelope"></i> Fabricstree@gmail.com</p>
<p><i class="fa fa-envelope"></i> Free Shipping World wide for all orders</p>
<p> <i class="fa fa-phone"></i> +123 456 7890</p>
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
        <input class="form-control me-2" type="search" placeholder="Search...." aria-label="Search">
    </form>

    @if(Auth::guard('customer')->check())
    <a href="{{ route('customer.logout')}}" ><button class="btn btn-outline-success login" type="button" >Logout</button></a>
    @else
    <button class="btn btn-outline-success login" type="submit" data-bs-toggle="modal"
        data-bs-target="#exampleModal">Login</button>
    @endif
    <!-- <button class="btn-outline-success login" type="submit" data-bs-toggle="modal"
        data-bs-target="#exampleModal">Login</button>
    </div> -->

</div>
</nav>