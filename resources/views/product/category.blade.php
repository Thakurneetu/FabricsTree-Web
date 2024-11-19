<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fabricstree</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/productCatg.css') }}">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</head>

<body>


  <div class="topnav gap-5">
    <p> <i class="fa fa-phone"></i> +123 456 7890</p>
    <p><i class="fa fa-envelope"></i> Fabricstree@gmail.com</p>
  </div>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

      <a class="navbar-brand" href="#"><img src="{{ asset('frontend/images/FT LOGO Ver.3 1.png') }}" alt=""></a>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <form class="d-flex" role="search">
          <input class="form-control me-2 Searchcustom" type="search" placeholder="Search product..."
            aria-label="Search">
          <button class="btn-outline-success maincolor" type="submit">Search</button>
        </form>
      </ul>

      <div class="d-flex justify-content-center gap-2" id="searchmob">
        <button class="btn-outline-success login" type="submit" data-bs-toggle="modal"
          data-bs-target="#exampleModal">Login</button>
        <button class="btn-outline-success maincolor" type="submit">Request a call back</button>
      </div>

    </div>
  </nav>

  <nav class="navbar navbar-expand-lg bg-body-tertiarys">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContents"
        aria-controls="navbarSupportedContents" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContents">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home +</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">About Us +</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Products +</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Contact Us +</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-items">
        <a class="nav-link" aria-disabled="" aria-current="page" href="#">Home</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>

      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">App Products</a>
      </li>
    </ul>
  </div>

  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h4> <i class="fa fa-filter" aria-hidden="true"></i> <b>Filter</b></h4>
      </div>

      <ul class="list-unstyled components">
        <li class="active">
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle mainbottom">Fabric
            category
          </a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
              <button type="button" class="btn btn-outline-secondary dropbutton">Cotton</button>
              <button type="button" class="btn btn-outline-secondary dropbutton">Rayon</button>
              <button type="button" class="btn btn-outline-secondary dropbutton">Denim</button>
              <button type="button" class="btn btn-outline-secondary dropbutton">Nylon</button>


            </li>
          </ul>
          <hr>
          <a href="#Requirement" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Requirement
          </a>
          <ul class="collapse list-unstyled" id="Requirement">
            <li>
              <button type="button" class="btn btn-outline-secondary dropbutton">Geirge</button>

            </li>
          </ul>
          <hr>
          <a href="#Subcategory" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Subcategory
          </a>
          <ul class="collapse list-unstyled" id="Subcategory">
            <li>
              <button type="button" class="btn btn-outline-secondary dropbutton">Cambr</button>
              <button type="button" class="btn btn-outline-secondary dropbutton">Voile</button>
            </li>
          </ul>
          <hr>
          <a href="#width" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Width
          </a>
          <ul class="collapse list-unstyled" id="width">
            <li>
              <button type="button" class="btn btn-outline-secondary dropbuttonfour">40/42
                inches</button><br>
              <button type="button" class="btn btn-outline-secondary dropbuttonfour">55/56 inches</button>
              <button type="button" class="btn btn-outline-secondary dropbuttonfour">60/65 inches</button>
            </li>
          </ul>
          <hr>
          <a href="#Wrap" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Warp</a>
          <ul class="collapse list-unstyled" id="wrap">
            <li>
              <button type="button" class="btn btn-outline-secondary dropbutton">Cambric</button>
              <button type="button" class="btn btn-outline-secondary dropbutton">Voile</button>
              <button type="button" class="btn btn-outline-secondary dropbutton">Poplin</button> <br>
              <button type="button" class="btn btn-outline-secondary dropbutton">Double Cloth</button>
              <button type="button" class="btn btn-outline-secondary dropbutton">Sheeting</button>
            </li>
          </ul>
          <hr>
          <a href="#Weft" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Weft</a>
          <hr>
          <a href="#Count" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Count</a>
          <hr>
          <a href="#Reed" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Reed</a>
          <hr>
          <a href="#Pik" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pik</a>

        </li>
      </ul>

    </nav>

    <!-- Page Content  -->
    <div id="content">
      <div class="container-fluid">

        <div style="margin-top: -15px;">
          <button type="button" id="sidebarCollapse" class="btn text-sidebar bg-turbo-yellow">
            <i id="collapseIcon" class="fas fa-arrow-left"></i>
            <span></span>
          </button>
        </div>


        <div class="container-fluid">
          <div class="container">

            <div class="headingbtn">
              <button type="button" class="btn btn-outline-dark">Cotton &nbsp;<i class="fa fa-times"
                  aria-hidden="true"></i></button>
              <button type="button" class="btn btn-outline-dark">RFD &nbsp;<i class="fa fa-times"
                  aria-hidden="true"></i></button>
              <button type="button" class="btn btn-outline-dark">Crepe &nbsp;<i class="fa fa-times"
                  aria-hidden="true"></i></button>
              <button type="button" class="btn btn-outline-dark">44/45 inches &nbsp;<i class="fa fa-times"
                  aria-hidden="true"></i></button>
            </div>

            <div class="row Productscat mt-4">

              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p1.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p2.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p3.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/product.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p4.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p5.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
            </div>

            <div class="row Productscat mt-4">

              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p1.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p2.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p3.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/product.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p4.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p5.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
            </div>

            <div class="row Productscat mt-4">

              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p1.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p2.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p3.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/product.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p4.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p5.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
            </div>

            <div class="row Productscat mt-4">

              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p1.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p2.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p3.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/product.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p4.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <img src="{{ asset('frontend/images/p5.png')}}" alt="Image 2" class="d-block">
                <div>Abuja Natural Fabric</div>
              </div>
            </div>

          </div>

        </div>

      </div>

    </div>


  </div>
  </div>



  <footer class="footer">

    <div class="container">
      <div class="row">
        <div class="footer-col col-lg-3 col-md-6 col-sm-12 col-xs-12">
          <div class="footerlogo">
            <img src="{{ asset('frontend/images/Footerlogo.png')}}">
          </div>
          <div class="social-links gap-5">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
          </div>
        </div>
        <div class="footer-col col-lg-3 col-md-6 col-sm-12 col-xs-12">
          <ul>
            <li><a href="#"><i class="fa fa-angle-right"></i> About us</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i> Products</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i> Terms & Condition</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i> Privacy Policy</a></li>
          </ul>
        </div>
        <div class="footer-col col-lg-3 col-md-6 col-sm-12 col-xs-12 thirdsecfooter">
          <h3>Contact Us</h3>
          <ul>
            <li><a href="#"><i class="fa fa-phone"></i> +91 8920 392 418</a></li>
            <li><a href="#"><i class="fa fa-envelope"></i> mail@ Fabricstree.com</a></li>
          </ul>
        </div>
        <div class="footer-col col-lg-3 col-md-6 col-sm-12 col-xs-12">
          <ul>
            <li><a href="#">Download the mobile app</a></li>
            <li><a href="#"> <img src="{{ asset('frontend/images/playstore.png')}}" alt=""> </a></li>
        </div>

      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
    crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#sidebarCollapse').find('#collapseIcon').toggleClass('fa-arrow-left').toggleClass('fa-arrow-right');
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>