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

            <div class="icondivtwo">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
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
                        <a class="nav-link active" href="#">Shopping Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="sectionlast">
        <div>
            <div class="column">
                <div class="col-lg-4 col-md-4 col-sm-12 photodiv ">
                    <div class=" row photodivtwo">
                        <div class="col-lg-4 col-md-4 col-sm-12 photodivimage">
                            <img src="{{ asset('frontend/images/image (1).png')}}" alt="">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 headparagraph">
                            <h3>Rayon Plain | 30’s</h3>
                            <p>68 x 58 | 48” | Air Jet</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 headparagraphtwo">
                            <h6>Greige</h6>
                        </div>
                    </div>


                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 photodiv">
                    <div class="row photodivtwo">
                        <div class="col-lg-4 col-md-4 col-sm-12 photodivimage">
                            <img src="{{ asset('frontend/images/Frame 177.png')}}" alt="">
                        </div>
                        <div class=" col-lg-4 col-md-4 col-sm-12 headparagraph">
                            <h3>Cotton Cambric | 60’s</h3>
                            <p>68 x 58 | 47" | Power Loom</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 headparagraphtwo">
                            <h6>Greige</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 photodiv">
                    <div class=" row photodivtwo">
                        <div class="col-lg-4 col-md-4 col-sm-12 photodivimage">
                            <img src="{{ asset('frontend/images/Frame 176.png')}}" alt="">
                        </div>
                        <div class=" col-lg-4 col-md-4 col-sm-12 headparagraph">
                            <h3>Off White Plain |40’s</h3>
                            <p>68 x 58 | 48” | Air Jet</p>
                        </div>
                        <div class=" col-lg-4 col-md-4 col-sm-12 headparagraphtwo">
                            <h6>Greige</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <button>Request a quite <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                </button>
            </div>
        </div>

    </section>


    <div class="lastrowparent">
        <div class="row lastrow">
            <div class="col-lg-7 col-md-7 col-sm-12 headingclass">
                <h2>STAY UPTO DATE ABOUT <br>OUR LATEST OFFERS</h2>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="inputform"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <input type="text" placeholder="Enter your email address">
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