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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/product.css') }}">
</head>

<body>


    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

            <a class="navbar-brand" href="#"><img src="{{ asset('frontend/images/FT LOGO Ver.3 1.png')}}" alt=""></a>

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

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-items">
                        <a class="nav-link" aria-disabled="" aria-current="page" href="#">Home</a>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Rayon Plain</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class=" row secondpagediv">
        <div class="col-lg-2 col-md-2 col-sm-12 secondpage">
            <div class="column">
                <div class="col-lg-4 col-md-4 col-sm-12 columncol"><img src="{{ asset('frontend/images/image.png')}}" alt=""
                        style="margin-top: 10px;"></div>
                <div class="col-lg-4 col-md-4 col-sm-12 columncol"><img src="{{ asset('frontend/images/image (3).png')}}" alt=""
                        style="margin-top: 10px;"></div>
                <div class="col-lg-4 col-md-4 col-sm-12 columncol"><img src="{{ asset('frontend/images/image (3).png')}}" alt=""
                        style="margin-top: 10px;"></div>
            </div>

        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 largeimage">
            <img src="{{ asset('frontend/images/image (1).png')}}" alt="#">
        </div>
        <div class=" col-lg-5 col-md-5 col-sm-12 headpara">
            <h2>
                Off White Plain 40s Rayon Fabric
            </h2>
            <p>68 x 58 | 48” | Air Jet</p>
            <div class="childheadpara">
                <h5>Descriptions</h5>
                <p>
                    <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>
                    <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>

                </p>
            </div>
            <div class="childheadpara">
                <h5>Key Features</h5>
                <p>
                    <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>
                    <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>
                    <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>
                    <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>

                </p>
            </div>
            <div class="childheadpara">
                <h5>Descriptions</h5>
                <p>
                    <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>
                    <li>Lorem Ipsum is simply dummy text of the printing and</li> <br>
                </p>
                <h6>width</h6>
            </div>
            <div class="buttonsection">
                <button>44 Inches / 112 cms</button>
            </div>
            <div class="buttonsection2">
                <button>Add to cart</button>
            </div>
        </div>
    </div>

    <div class="container-fluid productcolor">
        <div class="container">

            <div class="row Productss">

                <p class="Greigefabric">More Products to Explore</p>


                <div class="col-md-2 col-sm-6 col-xs-12">
                    <img src="{{ asset('frontend/images/p1.png')}}" alt="Image 2" class="d-block">
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <img src="{{ asset('frontend/images/p2.png')}}" alt="Image 2" class="d-block">
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <img src="{{ asset('frontend/images/p3.png')}}" alt="Image 2" class="d-block">
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <img src="{{ asset('frontend/images/product.png')}}" alt="Image 2" class="d-block">
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <img src="{{ asset('frontend/images/p4.png')}}" alt="Image 2" class="d-block">
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <img src="{{ asset('frontend/images/p5.png')}}" alt="Image 2" class="d-block">
                </div>
            </div>
        </div>

    </div>

    <div class="lastrowparent">
        <div class="row lastrow">
            <div class="col-lg-7 col-md-7 col-sm-12 headingclass">
                <h2>STAY UPTO DATE ABOUT <br>OUR LATEST OFFERS</h2>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="inputform">
                    <i class="fa fa-envelope"></i>
                    <input type="text" placeholder= "Enter your email address">
                    
                </div>
                <div class="inputformtwo"><button>Subscribe to Newsletter</button></div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

</body>

</html>