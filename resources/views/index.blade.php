@include('web.layouts.header')

  <div class="row slidermain">
    <div class="col-md-12 col-sm-12 mb-3 mb-sm-0">
      <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="{{ asset('frontend/images/slider.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h1>Largest Choice of Fabrics at Best Prices</h1>
              <p>Source fabrics directly from the large base of textile mills, thereby enjoying competitive price,
                faster delivery and wide variety on a single online platform.</p>
              <button class="btn-outline-success maincolor" type="submit">Shop Now</button>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="{{ asset('frontend/images/slider.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h1>Largest Choice of Fabrics at Best Prices</h1>
              <p>Source fabrics directly from the large base of textile mills, thereby enjoying competitive price,
                faster delivery and wide variety on a single online platform.</p>
              <button class="btn-outline-success maincolor" type="submit">Shop Now</button>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('frontend/images/slider.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h1>Largest Choice of Fabrics at Best Prices</h1>
              <p>Source fabrics directly from the large base of textile mills, thereby enjoying competitive price,
                faster delivery and wide variety on a single online platform.</p>
              <button class="btn-outline-success maincolor" type="submit">Shop Now</button>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  

    <div class="container-fluid">


      <div class="container-fluid Greigecontainer">

        <div class="row slidermain Greigepadding" style="padding-bottom: 3rem; position: relative;">
          <div class="startlogo">
            <img src="{{ asset('frontend/images/Star 11.png') }}" alt="start">
          </div>
          <div class="col-md-6 col-sm-12 mb-3 mb-sm-0" style="display: flex;align-items: center;">

            <div class="playout">
              <button type="button" class="btn btn-light" style="color: #78239B; font-size: 12px;">Design Your
                Own</button>
              <h2 class="Gfabric">Greige fabric</h2>
              <p>Lorem ipsum is typically a corrupted version of De minibus Bono rum et malform, a 1st-century BC text
                by the Roman statesman and philosopher Cicero, with words altered, added, and removed to make it
                nonsensical and improper Latin. The first two words themselves are a truncation of Dolores ipsum.
                Versions of the Lorem ipsum text have been used in typesetting at least since the 1960s.</p>
              <button class="btn-outline-success maincolor KnowMore" type="submit">Know More</button>
            </div>

          </div>
          <div class="col-md-6 col-sm-12">
            <div class="topsliderrightgreige">
              <img src="{{ asset('frontend/images/fabric.png') }}" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>

      </div>


      <div class="productcolor">
        <div class="container">
          <div class="row">
            <p class="Greigefabricpad">Categories</p>


            <div class="Categoriesbtn">
              <button type="button" class="btn btn-secondary active">Cotton</button>
              <button type="button" class="btn btn-secondary">Rayon</button>
              <button type="button" class="btn btn-secondary">Denim</button>
              <button type="button" class="btn btn-secondary">Polyester</button>
              <button type="button" class="btn btn-secondary">Nylon</button>
              <button type="button" class="btn btn-secondary">Linen</button>
              <button type="button" class="btn btn-secondary">Sustainable</button>
            </div>



            <div class="CategoriesbtnGRID">
              <div class="active">Greige</div>
              <div>Yarn dyed</div>
              <div>RFD</div>
              <div>Dyed</div>
              <div>Printed</div>

            </div>


            <div class="slider" id="slider">
              <div class="slide" id="slide">
                <img class="item" src="{{ asset('frontend/images/p1.png') }}">
                <img class="item" src="{{ asset('frontend/images/p2.png') }}">
                <img class="item" src="{{ asset('frontend/images/p5.png') }}">
                <img class="item" src="{{ asset('frontend/images/p1.png') }}">
                <img class="item" src="{{ asset('frontend/images/p5.png') }}">
                <img class="item" src="{{ asset('frontend/images/p1.png') }}">
                <img class="item" src="{{ asset('frontend/images/p2.png') }}">
                <img class="item" src="{{ asset('frontend/images/p5.png') }}">
                <img class="item" src="{{ asset('frontend/images/p1.png') }}">
                <img class="item" src="{{ asset('frontend/images/p5.png') }}">
                <img class="item" src="{{ asset('frontend/images/p1.png') }}">
                <img class="item" src="{{ asset('frontend/images/p2.png') }}">
                <img class="item" src="{{ asset('frontend/images/p5.png') }}">
                <img class="item" src="{{ asset('frontend/images/p1.png') }}">
                <img class="item" src="{{ asset('frontend/images/p5.png') }}">
              </div>
              <button class="ctrl-btn pro-prev"><i class="fa fa-angle-left"></i></button>
              <button class="ctrl-btn pro-next"><i class="fa fa-angle-right"></i></button>
            </div>
          </div>
        </div>
      </div>

      <div class="row Greigepaddingsec">
        <div class="col-md-4 col-sm-12 mb-3 mb-sm-0 imagetextrelative">
          <img src="{{ asset('frontend/images/imagef1.png') }}" alt="Image 1">

          <div class="imagetext">
            <h2 class="Gfabric">Greige fabric</h2>
            <div class="playout">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the</p>
              <button class="btn-outline-success maincolor" type="submit">Know More</button>
            </div>
          </div>

        </div>
        <div class="col-md-4 col-sm-12 mb-3 mb-sm-0 secbothimg">
          <div class="column columnimage">
            <div class="col-12 imagetextrelative">
              <img src="{{ asset('frontend/images/imagef2.png') }}" alt="Image 2" class="img-fluid">

              <div class="imagetext">
                <h2 class="Gfabric">Greige fabric</h2>
                <div class="playout">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the</p>
                  <button class="btn-outline-success maincolor" type="submit">Know More</button>
                </div>
              </div>

            </div>
            <div class="col-12 imagetextrelative">
              <img src="{{ asset('frontend/images/imagef3.png') }}" alt="Image 3" class="img-fluid">

              <div class="imagetext">
                <h2 class="Gfabric">Greige fabric</h2>
                <div class="playout">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the</p>
                  <button class="btn-outline-success maincolor" type="submit">Know More</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12 mb-3 mb-sm-0 imagetextrelative">
          <img src="{{ asset('frontend/images/imagef4.png') }}" alt="Image 4">
          <div class="imagetext">
            <h2 class="Gfabric">Greige fabric</h2>
            <div class="playout">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the</p>
              <button class="btn-outline-success maincolor" type="submit">Know More</button>
            </div>
          </div>
        </div>
      </div>



      <div class="container-fluid">

        <div class="Product">

          <p class="Greigefabric">Top Product</p>
          <div class="card-group">
            <div class="card m-3">
            <a href="{{route('product.productdetail')}}"><img class="card-img-top" src="{{ asset('frontend/images/p1.png') }}" alt="Card image cap"></a>
              <div class="card-body">
                <h5 class="card-titles">Textile Suiting Fabric</h5>
                <div class="reviews">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="far fa-star"></i>
                </div>
                <a href="{{route('product.productcart')}}"><button style="width:175px" class="btn-outline-success maincolor KnowMore" type="submit">Add to Cart</button></a>


              </div>

            </div>
            <div class="card m-3">
            <a href="{{route('product.productdetail')}}"><img class="card-img-top" src="{{ asset('frontend/images/p2.png') }}" alt="Card image cap"></a>
              <div class="card-body">
                <h5 class="card-titles">Textile Suiting Fabric</h5>
                <div class="reviews">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="far fa-star"></i>
                </div>
                <a href="{{route('product.productcart')}}"><button style="width:175px" class="btn-outline-success maincolor KnowMore" type="submit">Add to Cart</button></a>


              </div>

            </div>
            <div class="card m-3">
            <a href="{{route('product.productdetail')}}"><img class="card-img-top" src="{{ asset('frontend/images/p3.png') }}" alt="Card image cap"></a>
              <div class="card-body">
                <h5 class="card-titles">Textile Suiting Fabric</h5>
                <div class="reviews">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="far fa-star"></i>
                </div>
                <a href="{{route('product.productcart')}}"><button style="width:175px" class="btn-outline-success maincolor KnowMore" type="submit">Add to Cart</button></a>


              </div>

            </div>
            <div class="card m-3">
            <a href="{{route('product.productdetail')}}"><img class="card-img-top" src="{{ asset('frontend/images/p3.png') }}" alt="Card image cap"></a>
              <div class="card-body">
                <h5 class="card-titles">Textile Suiting Fabric</h5>
                <div class="reviews">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="far fa-star"></i>
                </div>
                <a href="{{route('product.productcart')}}"><button style="width:175px" class="btn-outline-success maincolor KnowMore" type="submit">Add to Cart</button></a>


              </div>

            </div>
          </div>
        </div>




      </div>

      <div class="container-fluid">

        <div class="row productcolor Product mt-4" style="padding-bottom: 3rem;">

          <div class="col-md-6 col-sm-12 mb-3 mb-sm-0">
            <div class="row">
              <div class="col-md-6 col-sm-12 mb-3 mb-sm-0 topsliderright">
                <img src="{{ asset('frontend/images/fabric.png') }}" class="d-block w-100" alt="...">
              </div>

              <div class="col-md-6 col-sm-12 mb-3 mb-sm-0 secbothimg">
                <div class="column columnimage">
                  <div class="col-12 aboutss">
                    <img src="{{ asset('frontend/images/imagef2.png') }}" alt="Image 2" class="img-fluid">
                  </div>
                  <div class="col-12 aboutss">
                    <img src="{{ asset('frontend/images/imagef3.png') }}" alt="Image 3" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-12 mb-3 mb-sm-0 ">

            <div class="p-3">

              <div class="aboutusHeading">
                <p class="aboutus">About Us</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                  industry's standard dummy text ever since the</p>
              </div>

              <div class="aboutusHeadingsec">
                <p>
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                  industry's standard dummy text ever since the 1500s.

                  when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                  survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
                  unchanged. It was popularised in the Lorem Ipsum is simply dummy text of the printing and typesetting
                  industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                  unknown
                  printer took a galley of type and scrambled it to make a type specimen book.
                </p>
              </div>

              <button class="btn-outline-success maincolor KnowMore" type="submit">Know More</button>

            </div>

          </div>

        </div>
      </div>


      <div class="container-fluid">

        <div class="row Greigepaddingsec">

          <div class="text-center mb-2">
            <p class="Greigefabric_gal">Gallery</p>
            <p style="color: #83848A; margin: unset;">Lorem Ipsum is simply dummy text of the printing and
              typesetting industry.</p>
            <p style="color: #83848A; margin: unset;">Lorem Ipsum has been the industry's standard dummy text ever since
              the 1500s.</p>

          </div>


          <div class="col-md-2 col-sm-12 mb-3 mb-sm-0 imagetextrelative">
            <img src="{{ asset('frontend/images/imagef1.png') }}" alt="Image 1">
          </div>

          <div class="col-md-2 col-sm-12 mb-3 mb-sm-0 secbothimg">
            <div class="column columnimage">
              <div class="col-12 imagetextrelative">
                <img src="{{ asset('frontend/images/imagef2.png') }}" alt="Image 2" class="img-fluid">
              </div>
              <div class="col-12 imagetextrelative">
                <img src="{{ asset('frontend/images/imagef3.png') }}" alt="Image 3" class="img-fluid">
              </div>
            </div>
          </div>

          <div class="col-md-2 col-sm-12 mb-3 mb-sm-0 imagetextrelative">
            <img src="{{ asset('frontend/images/imagef1.png') }}" alt="Image 1">
          </div>

          <div class="col-md-2 col-sm-12 mb-3 mb-sm-0 secbothimg">
            <div class="column columnimage">
              <div class="col-12 imagetextrelative">
                <img src="{{ asset('frontend/images/imagef2.png') }}" alt="Image 2" class="img-fluid">
              </div>
              <div class="col-12 imagetextrelative">
                <img src="{{ asset('frontend/images/imagef3.png') }}" alt="Image 3" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="col-md-2 col-sm-12 mb-3 mb-sm-0 imagetextrelative">
            <img src="{{ asset('frontend/images/imagef4.png') }}" alt="Image 4">

          </div>
          <div class="col-md-2 col-sm-12 mb-3 mb-sm-0 imagetextrelative">
            <img src="{{ asset('frontend/images/imagef4.png') }}" alt="Image 4">

          </div>
        </div>

      </div>

      <div class="container-fluid Greigepaddingsec">

        <section id="testimonials">

          <p class="Greigefabric_gal">Testimonial</p>
          <div class="testimonial-box-container">

            <div class="testimonial-box">

              <div class="box-top">

                <div class="profile">

                  <div class="profile-img">
                    <img src="{{ asset('frontend/images/ddd.png') }}" />
                  </div>
                </div>

                <div class="reviews">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="far fa-star"></i>
                </div>
              </div>

              <div class="client-comment">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident
                  temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur
                  voluptates
                  incidunt blanditiis sed atque cumque.</p>
              </div>

              <div class="box-top">

                <div class="profile">

                  <div class="profile-img">
                    <img src="{{ asset('frontend/images/girl.png') }}" />
                  </div>

                  <div class="name-user">
                    <strong>Liam mendes</strong>
                  </div>
                </div>
              </div>
            </div>

            <div class="testimonial-box">

              <div class="box-top">

                <div class="profile">

                  <div class="profile-img">
                    <img src="{{ asset('frontend/images/ddd.png') }}" />
                  </div>
                </div>

                <div class="reviews">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
              </div>

              <div class="client-comment">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident
                  temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur
                  voluptates
                  incidunt blanditiis sed atque cumque.</p>
              </div>

              <div class="box-top">

                <div class="profile">

                  <div class="profile-img">
                    <img src="{{ asset('frontend/images/girl.png') }}" />
                  </div>

                  <div class="name-user">
                    <strong>Noah Wood</strong>
                  </div>
                </div>
              </div>
            </div>

            <div class="testimonial-box">

              <div class="box-top">

                <div class="profile">

                  <div class="profile-img">
                    <img src="{{ asset('frontend/images/ddd.png') }}" />
                  </div>
                </div>

                <div class="reviews">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="far fa-star"></i>
                </div>
              </div>

              <div class="client-comment">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident
                  temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur
                  voluptates
                  incidunt blanditiis sed atque cumque.</p>
              </div>

              <div class="box-top">

                <div class="profile">

                  <div class="profile-img">
                    <img src="{{ asset('frontend/images/girl.png') }}" />
                  </div>

                  <div class="name-user">
                    <strong>Oliver Queen</strong>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </section>


        <section class="mt-4 p-4">

          <div class="row">

            <div class="col-md-6 testimonialfluid">
              <h2 style="font-weight: bold mb-2">Get in Touch</h2>
              <form id="contactForm">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                      <input type="text" class="form-control" id="name" placeholder="Enter your name" required />
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                      <input type="text" class="form-control" id="name" placeholder="Enter your mobile number"
                        required />
                    </div>
                  </div>
                </div>

                <div class="mb-3">
                  <input type="email" class="form-control" id="email" placeholder="Enter your email address" required />
                </div>
                <div class="mb-3">
                  <textarea class="form-control" id="message" rows="5" placeholder="Type a message..."
                    style="height: 120px;"></textarea>
                </div>

                <button class="btn-outline-success maincolor" type="submit">Submit</button>

              </form>
            </div>


            <div class="col-lg-6 col-md-6 col-sm-12 ">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="icondiv">
                    <div><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div>
                      <h4>Our Address</h4>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                    </div>
                  </div>
                  <div class="icondiv">
                    <div><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div>
                      <h4>General Enquiries</h4>
                      <p>websupport@Fabrics treee</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="icondiv">
                    <div><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div>
                      <h4>Call us</h4>
                      <p>+91 12345 12456</p>
                    </div>
                  </div>
                  <div class="icondiv">
                    <div><i class="fa fa-clock" aria-hidden="true"></i></div>
                    <div>
                      <h4>Our Timing</h4>
                      <p>Mon - Sun :10:00AM - 04:00 PM</p>
                    </div>
                  </div>
                </div>
              </div>

              <div>
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30145.17140331232!2d72.80210472571645!3d19.188805882169866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b6914fe3a8e5%3A0x73f264109c4db9d4!2sMalad%2C%20Malad%20West%2C%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1730286440157!5m2!1sen!2sin"
                  width="600" height="200" style="width: 100%;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>

            </div>

          </div>


        </section>

      </div>
    </div>

    @include('web.layouts.footer')
  </div>

    