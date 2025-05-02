@include('web.layouts.header')
<style> 
  #testimonialCarousel.carousel img {
  /* width: 70px; */
  max-height: 70px;
  border-radius: 50%;
  margin-right: 1rem;
  overflow: hidden;
}
#testimonialCarousel.carousel-inner1 {
  padding: 1em;
}

@media screen and (min-width: 576px) {
  .carousel-inner1 {
    display: flex;
    width: 100%;
    margin-inline: auto;
    padding: 0;
    overflow: hidden;
  }
  .carousel-item1 {
    display: block;
    margin-right: 0;
    flex: 0 0 calc(95% / 2);
  }
}
@media screen and (min-width: 768px) {
  .carousel-item1 {
    display: block;
    margin-right: 0;
    flex: 0 0 calc(95% / 3);
  }
}
#testimonialCarousel.carousel .card {
  margin: 0 0.5em;
  border: 0;
} 

#testimonialCarousel.carousel-control-prev,
#testimonialCarousel.carousel-control-next {
  width: 3rem;
  height: 3rem;
  background-color: grey;
  border-radius: 50%;
  top: 50%;
  transform: translateY(-50%);
} 
 
  </style>
  @session('success')
      <div class="alert alert-success msg" style="text-align: center;" role="alert"> 
        {{ $value }}
      </div>
  @endsession
  <script>
    setInterval(function () {
        $('.msg').hide();
    }, 4000);
  </script>
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
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3"
            aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="{{ asset('frontend/images/slider.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h1>Largest choices when it comes to fabrics</h1>
              <div class="aligcra">
                <p>Unmatched sourcing from proven mills, reliable pricing and timely deliveries with a vast range under solely dedicated online platform.</p>
              </div>
              <a href="{{route('product.index')}}"><button class="btn-outline-success maincolor" type="submit">Shop Now</button></a>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="{{ asset('frontend/images/slider.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h1>Procure fabrics from nation’s leading platform</h1>
              <div class="aligcra">
                <p>Our committed supply chain, unfolding challenges and support excellence drove us to establish long term business relationship with our clients.</p>
              </div>
              <a href="{{route('product.index')}}"><button class="btn-outline-success maincolor" type="submit">Shop Now</button></a>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('frontend/images/slider.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h1>Live tracking & trusted logistics</h1>
              <div class="aligcra">
                <p>Splendid logistics partner from the industry and across the country, unrivaled prompt deliveries.</p>
              </div>
              <a href="{{route('product.index')}}"><button class="btn-outline-success maincolor" type="submit">Shop Now</button></a>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('frontend/images/slider.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h1>Together we can and we will</h1>
              <div class="aligcra">
                <p>Partner with us to explore the best deals across the country.</p>
              </div>
              <a href="{{route('product.index')}}"><button class="btn-outline-success maincolor" type="submit">Shop Now</button></a>
            </div>
          </div>
        </div>
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button> -->

        <button class="carousel-control-prev ctrl-btn" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span> -->
          <i class="fa fa-arrow-left"></i>
        </button>
        <button class="carousel-control-next ctrl-btn" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span> -->
          <i class="fa fa-arrow-right"></i>
        </button>
        
      </div>
    </div>
  

    <div class="container-fluid mt-5">


    <div class="Greigecontainer">

<div class="row slidermain Greigepadding" style="padding-bottom: 3rem; position: relative;">
  <div class="startlogo">
    <img src="{{ asset('frontend/images/Star 11.png') }}" alt="start">
  </div>
  <div class="col-md-6 col-sm-12 mb-3 mb-sm-0" style="display: flex;align-items: center;">

    <div class="playout">
      <button type="button" class="btn btn-light" style="color: #78239B; font-size: 15px;">Design Your
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
      <img src="{{ asset('frontend/images/greige-fabric.jpeg') }}" class="d-block w-100" alt="...">
    </div>
  </div>
</div>

</div>

<div class="productcolor">
<div class="container">
  <div class="row">
    <p class="Greigefabricpad">Categories</p>


    <div class="Categoriesbtn">
    @foreach($categories as $key => $categories_val)
    <button type="button" class="btn btn-secondary @if($key==0) active  @endif">{{$categories_val->name}}</button>
    @endforeach
    </div>



    <div class="CategoriesbtnGRID">
      <div class="active">Greige</div>
      <div>Yarn dyed</div>
      <div>RFD</div>
      <div>Dyed</div>
      <div>Printed</div>
    </div>


    <div class="slider mt-2" id="slider">
      <div class="slide" id="slide">
      @foreach($categories as $key => $categories_val)
        <div class="text-center">
          <img class="item" src="{{asset($categories_val->image)}}">
          <p class="mt-2 slidername">{{$categories_val->name}}</p>
        </div>
      @endforeach
        <!-- <div class="text-center">
          <img class="item" src="{{ asset('frontend/images/cotton.jpeg') }}">
          <p class="mt-2 slidername">Cotton</p>
        </div>
        <div class="text-center">
          <img class="item" src="{{ asset('frontend/images/nylon.png') }}">
          <p class="mt-2 slidername">Nylon</p>
        </div>

        <div class="text-center">
          <img class="item" src="{{ asset('frontend/images/polyster.jpg') }}">
          <p class="mt-2 slidername">Polyester</p>
        </div>
        <div class="text-center">
          <img class="item" src="{{ asset('frontend/images/rayon.png') }}">
          <p class="mt-2 slidername">Rayon</p>
        </div>

        <div class="text-center">
          <img class="item" src="{{ asset('frontend/images/denim.jpg') }}">
          <p class="mt-2 slidername">Denim</p>
        </div>
        <div class="text-center">
          <img class="item" src="{{ asset('frontend/images/linen.jpg') }}">
          <p class="mt-2 slidername">Linen</p>
        </div>
        <div class="text-center">
          <img class="item" src="{{ asset('frontend/images/sustainable.jpg') }}">
          <p class="mt-2 slidername">Sustainable</p>
        </div>
        
        <div class="text-center">
          <img class="item" src="{{ asset('frontend/images/cotton.jpeg') }}">
          <p class="mt-2 slidername">Cotton</p>
        </div>
        <div class="text-center">
          <img class="item" src="{{ asset('frontend/images/nylon.png') }}">
          <p class="mt-2 slidername">Nylon</p>
        </div>

        <div class="text-center">
          <img class="item" src="{{ asset('frontend/images/polyster.jpg') }}">
          <p class="mt-2 slidername">Polyester</p>
        </div> -->

        <div class="text-center">
          <img class="item" src="{{ asset('frontend/images/nylon.png') }}">
          <p class="mt-2 slidername">Nylon</p>
        </div>

        <div class="text-center">
          <img class="item" src="{{ asset('frontend/images/polyster.jpg') }}">
          <p class="mt-2 slidername">Polyester</p>
        </div>

        <div class="text-center">
          <img class="item" src="{{ asset('frontend/images/polyster.jpg') }}">
          <p class="mt-2 slidername">Polyester</p>
        </div>

      </div>
      <button class="ctrl-btn pro-prev"><i class="fa fa-arrow-left"></i></button>
      <button class="ctrl-btn pro-next"><i class="fa fa-arrow-right"></i></button>
    </div>
  </div>
</div>
</div>


<div class="row Greigepaddingsec">
<div class="col-md-4 col-sm-12 mb-3 mb-sm-0 imagetextrelative">
  <img src="{{ asset('frontend/images/imagef1.png') }}" alt="Image 1">

  <div class="imagetext">
    <h2 class="Gfabric">Greige fabric</h2>
    <div class="playouts">
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
        <div class="playouts">
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
        <div class="playouts">
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
    <div class="playouts">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
        industry's standard dummy text ever since the</p>
      <button class="btn-outline-success maincolor" type="submit">Know More</button>
    </div>
  </div>
</div>
</div>



<div class="container-fluid">

<div class="Product">
<div style="color: #78239B; text-decoration: underline; cursor:pointer; float:right" id="resetFilter">
    <a href="{{route('product.index')}}" style="color: #78239B;">See All</a>
  </div>
  <p class="Greigefabric">Top Product</p>
  
  <div class="card-group">
    
    @foreach($products as $key=>$products_val)
    @if( $loop->first or $loop->iteration  <= 4 )
    <div class="card m-3">
      @if(isset($products_val) && count($products_val->images) > 0)
      <a href="{{route('product.productdetail')}}/{{$products_val->id}}"><img class="card-img-top" src="{{asset($products_val->images[0]->path)}}" alt="Card image cap"></a>
      @endif
      <div class="card-body">
        <h5 class="card-titles"><a href="{{route('product.productdetail')}}/{{$products_val->id}}">{{$products_val->title}}</a></h5>
        <!-- <div class="reviews">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="far fa-star"></i>
        </div> -->
        @if(!in_array($products_val->id, $carts))
        <button class="btn-outline-success add_to_cart maincolor KnowMore" productid="{{$products_val->id}}" id="add_to_cart_{{$products_val->id}}" type="submit" style="margin: 0px 25px;"> @if($customer) @if($customer->user_type=='Customer') Add to Cart @else Add to My Product @endif @else Add to Cart @endif</button>

          @if($customer && $customer->user_type=='Customer') <a href="{{route('product.productcart') }}" > @else  <a href="{{route('product.myproduct') }}" > @endif
          <button class="btn-outline-success KnowMore maincolor" id="go_to_cart_{{$products_val->id}}" style="display: none;margin: 0px 25px;" productid="{{$products_val->id}}" type="submit">@if($customer) @if($customer->user_type=='Customer') Go to Cart @else Go to My Products @endif @else Go to Cart @endif </button></a>

        @else

        @if($customer && $customer->user_type=='Customer') <a href="{{route('product.productcart') }}" > @else  <a href="{{route('product.myproduct') }}" > @endif
          
        <button class="btn-outline-success KnowMore maincolor" id="go_to_cart_{{$products_val->id}}" style="margin: 0px 25px;" productid="{{$products_val->id}}" type="submit">@if($customer) @if($customer->user_type=='Customer') Go to Cart @else Go to My Products @endif @else Go to Cart @endif </button></a>
        @endif
        <!--  -->
      </div>
      @endif
    </div>
    @endforeach
  </div>
</div>




</div>

<div class="container-fluid aboutsbg">

<div class="row Product mt-4" style="padding-bottom: 3rem;">

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

      <a href="{{route('aboutus')}}"><button class="btn-outline-success maincolor KnowMore" type="submit">Know More</button></a>

    </div>

  </div>

</div>
</div>


<div class="container-fluid">

<div class="row Greigepaddingsec GallSinglepadding" style="padding: 3rem 0rem">

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

  <div class="col-md-2 col-sm-12 mb-3 mb-sm-0 secbothimg" style="padding-right:unset;">
    <div class="column columnimage">
      <div class="col-12 imagetextrelative">
        <img src="{{ asset('frontend/images/imagef2.png') }}" alt="Image 2" class="img-fluid">
      </div>
      <div class="col-12 imagetextrelative">
        <img src="{{ asset('frontend/images/imagef3.png') }}" alt="Image 3" class="img-fluid">
      </div>
    </div>
  </div>
  <div class="col-md-2 col-sm-12 mb-3 mb-sm-0">
    <img src="{{ asset('frontend/images/imagef4.png') }}" alt="Image 4">

  </div>
  <div class="col-md-2 col-sm-12 mb-3 mb-sm-0 imagetextrelative">
    <img src="{{ asset('frontend/images/imagef4.png') }}" alt="Image 4">

  </div>
</div>

</div>

<div class="container-fluid Greigepaddingsec">

<section id="testimonials">

  <p class="Greigefabric_gal">Testimonials</p>
   <div class="testimonial-box-container">

    <div class="container-fluid bg-body-tertiary py-3">
      <div id="testimonialCarousel" class="carousel">
        <div class="carousel-inner1 ">
        @foreach($testimonials as $testimonial_val)  
        <div class="testimonial-box carousel-item1 active">

          <div class="box-top">

            <div class="profile">

              <div class="profile-img">
                <img src="{{ asset('frontend/images/ddd.png') }}" />
              </div>
            </div>

            <div class="reviews">
            @for ($x = 1; $x <= $testimonial_val->rating ; $x++) 
              <i class="fa fa-star"></i>
            @endfor
            @for ($x = 1; $x <= (5-$testimonial_val->rating) ; $x++) 
              <i class="far fa-star"></i>
            @endfor
            </div>
          </div>

          <div class="client-comment">
            <p>{{ $testimonial_val->comment }}</p>
          </div>

          <div class="box-top">

            <div class="profile">

              <div class="profile-img">
                @if($testimonial_val->image != '')
                <img src="{{ asset($testimonial_val->image) }}" />
                @else
                <img src="{{ asset('frontend/images/girl.png') }}" />
                @endif
              </div>

              <div class="name-user">
                <strong>— {{ $testimonial_val->name }}, {{ $testimonial_val->designation }}</strong>
              </div>
            </div>
          </div>
        </div>
        @endforeach 
        
        </div>
        

        <button class="carousel-control-prev ctrl-btn pro-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
          <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span> -->
          <i class="fa fa-arrow-left"></i>
        </button>
        <button class="carousel-control-next ctrl-btn pro-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
          <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span> -->
          <i class="fa fa-arrow-right"></i>
        </button>
      </div>
    </div>

  </div>

</section>


<section class="mt-4 p-4">

  <div class="row">

    <div class="col-md-6 testimonialfluid">
      <h2 style="font-weight: bold mb-2">Get in Touch</h2>
      <form method="POST" id="contactForm" name="contactForm" >
          @csrf
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="mb-3">
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" />
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="mb-3">
              <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="Enter your mobile number" />
            </div>
          </div>
        </div>

        <div class="mb-3">
          <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address" />
        </div>
        <div class="mb-3">
          <textarea class="form-control" name="message" id="message" rows="5" placeholder="Type a message..."
            style="height: 120px;"></textarea>
        </div>

        <button class="btn-outline-success maincolor" name="save_contactus" id="save_contactus" type="button">Submit</button>

      </form>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-12 ">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="icondiv">
            <div><i class="fa fa-map-marker" aria-hidden="true"></i></div>
            <div>
              <h4>Our Address</h4>
              <p>G-179, Ground Floor, RIICO Industrial Area, Mansarovar Jaipur - 302020 (Rajasthan)</p>
            </div>
          </div>
          <div class="icondiv">
            <div><i class="fa fa-phone" aria-hidden="true"></i></div>
            <div>
              <h4>Call us</h4>
              <p>+91 9650608918</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="icondiv">
            <div><i class="fa fa-envelope" aria-hidden="true"></i></div>
            <div>
              <h4>General Enquiries</h4>
              <p>bloombugsfabric@gmail.com</p>
            </div>
          </div><br/><br/>
          <div class="icondiv">
            <div><i class="fa fa-clock" aria-hidden="true"></i></div>
            <div>
              <h4>Our Timing</h4>
              <p>Mon - Sun 10:00 AM to 5:30 PM</p>
            </div>
          </div>
        </div>
      </div>

      <div>
        <!-- <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30145.17140331232!2d72.80210472571645!3d19.188805882169866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b6914fe3a8e5%3A0x73f264109c4db9d4!2sMalad%2C%20Malad%20West%2C%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1730286440157!5m2!1sen!2sin"
          width="600" height="200" style="width: 100%;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe> -->

          <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=200&amp;hl=en&amp;q=G-179, Ground Floor, RIICO Industrial Area, Mansarovar Jaipur - 302020 (Rajasthan)&amp;t=&amp;z=10&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://sprunkin.com/">Sprunki</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:200px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:200px;}.gmap_iframe {height:200px!important;}</style></div>
          
      </div>

    </div>

  </div>


</section>

</div>
    </div>

    @include('web.layouts.footer')
  </div>

  <script>
    $('.add_to_cart').click(function () {
        var id = $(this).attr('productid');
        var qty = 1;//$this.attr('quantity').val();
        add_to_cart(id,qty);
    });
  </script>

    