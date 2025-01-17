@include('web.layouts.header')
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">

      <div class="siebrbutn">
        <button type="button" id="sidebarCollapse" class="btn text-sidebar bg-turbo-yellow">
          <i id="collapseIcon" class="fas fa-arrow-left"></i>
          <span></span>
        </button>
      </div>

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

              <div class="p-1">
                
                @foreach($categories as $category)
                  <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" name="category_id" id="category_id_{{$category->id}}" value="{{$category->id}}">
                    <label class="form-check-label" for="flexRadioDefault1">
                    {{$category->name}}
                    </label>
                  </div>
                @endforeach
              </div>


            </li>
          </ul>
          <hr>
          <a href="#Requirement" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Requirement
          </a>
          <ul class="collapse list-unstyled" id="Requirement">
            <li>
              <div class="p-1">
                @foreach($requirements as $requirement)
                <div class="form-check mt-3">
                  <input class="form-check-input" type="checkbox" name="requirement_id" id="requirement_id_{{$requirement->id}}" value="{{$requirement->id}}">
                  <label class="form-check-label" for="flexRadioDefault1">
                  {{$requirement->name}}
                  </label>
                </div>
                @endforeach
              </div>

            </li>
          </ul>
          <hr>
          <a href="#Subcategory" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Subcategory
          </a>
          <ul class="collapse list-unstyled" id="Subcategory">
            <li>
              <div class="p-1">
              @foreach($subcategories as $subcategory)
              <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" name="subcategory_id" id="subcategory_id_{{$subcategory->id}}" value="{{$subcategory->id}}">
                <label class="form-check-label" for="flexRadioDefault1">
                {{$subcategory->name}}
                </label>
              </div>
              @endforeach
              </div>
            </li>
          </ul>
          <hr>
          <a href="#width" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Width
          </a>
          <ul class="collapse list-unstyled" id="width">
            <li>
              <div class="p-1">

                @foreach($widths as $width)
                  <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1" value="{{$width}}">
                    <label class="form-check-label" for="flexRadioDefault1">
                    {{$width}}
                    </label>
                  </div>
                @endforeach
                
              </div>
            </li>
          </ul>
          <hr>
          <a href="#wraps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Warp</a>
          <ul class="collapse list-unstyled" id="wraps">
            <li>
            <div class="p-1">
              @foreach($wraps as $wrap)
                <div class="form-check mt-3">
                  <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1" value="{{$wrap}}">
                  <label class="form-check-label" for="flexRadioDefault1">
                  {{$wrap}}
                  </label>
                </div>
              @endforeach
              </div>
            </li>
          </ul>
          <hr>
          <a href="#Weft" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Weft</a>
          <ul class="collapse list-unstyled" id="Weft">
            <li>
            <div class="p-1">
              @foreach($wefts as $weft)
                <div class="form-check mt-3">
                  <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1" value="{{$weft}}">
                  <label class="form-check-label" for="flexRadioDefault1">
                  {{$weft}}
                  </label>
                </div>
              @endforeach
              </div>
            </li>
          </ul>
          <hr>
          <a href="#Count" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Count</a>
          <ul class="collapse list-unstyled" id="Count">
            <li>
            <div class="p-1">
              @foreach($counts as $count)
                <div class="form-check mt-3">
                  <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1" value="{{$count}}">
                  <label class="form-check-label" for="flexRadioDefault1">
                  {{$count}}
                  </label>
                </div>
              @endforeach
              </div>
            </li>
          </ul>
          <hr>
          <a href="#Reed" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Reed</a>
          <ul class="collapse list-unstyled" id="Reed">
            <li>
            <div class="p-1">
              @foreach($reeds as $reed)
                <div class="form-check mt-3">
                  <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1" value="{{$reed}}">
                  <label class="form-check-label" for="flexRadioDefault1">
                  {{$reed}}
                  </label>
                </div>
              @endforeach
              </div>
            </li>
          </ul>
          <hr>
          <a href="#Pik" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pick</a>
          <ul class="collapse list-unstyled" id="Pik">
            <li>
            <div class="p-1">
              @foreach($picks as $pick)
                <div class="form-check mt-3">
                  <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1" value="{{$pick}}">
                  <label class="form-check-label" for="flexRadioDefault1">
                  {{$pick}}
                  </label>
                </div>
              @endforeach
              </div>
            </li>
          </ul>
          <br/>
          <button class="btn-outline-success KnowMore maincolor" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCustomizeRequirement">Customize</button>
        </li>
      </ul>

    </nav>

    <!-- Page Content  -->
    <div id="content">
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="container">

            <div class="headingbtn">
              <hr>
              <div class="headingbtn d-flex justify-content-between">
                <div>
                  <button type="button" class="btn btn-outline-dark">Cotton &nbsp;<i class="fa fa-times"
                      aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-outline-dark">RFD &nbsp;<i class="fa fa-times"
                      aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-outline-dark">Crepe &nbsp;<i class="fa fa-times"
                      aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-outline-dark">44/45 inches &nbsp;<i class="fa fa-times"
                      aria-hidden="true"></i></button>
                </div>
                <div style="color: #78239B; text-decoration: underline;">
                  Reset All
                </div>
              </div>
              <hr>
            </div>
            <div class="row Productscat mt-4">
              <div class="card-group">
              @foreach($products as $products_val)
              
                <div class="card m-3">
                  @if(isset($products_val) && count($products_val->images) > 0)
                  <a href="{{route('product.productdetail')}}/{{$products_val->id}}"><img class="card-img-top" src="{{asset($products_val->images[0]->path)}}" alt="Card image cap"></a>
                  @endif
                  <div class="card-body">
                    <h5 class="card-titles"><a href="{{route('product.productdetail')}}/{{$products_val->id}}">{{$products_val->title}}</a></h5>
                    <div class="reviews">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="far fa-star"></i>
                    </div>
                    <!-- maincolor -->
                    <button class="btn-outline-success  KnowMore" type="submit">Add to Cart</button>
                  </div>
                </div>
              @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<!-- Modal Customize as per your requirement-->
<div class="modal fade" id="exampleModalCustomizeRequirement" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="text-center w-100">
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="d-flex justify-content-center" style="margin-top: -6rem;">
                        <div class="modelimage" style="background-color: #EFE3F4;border: 10px solid #fff">
                            <img class="p-3" src="{{ asset('frontend/images/seeting.png') }}" alt="thanks" width="80">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center w-100  mb-3">
                        <div class="text-center verify">
                            <h1 class="modal-title fs-4" id="exampleModalLabel loginheding">Customize as per your
                                requirement</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="mb-3 registerss">

                                <label for="FabricCategory" style="font-weight: bold;">Fabric Category</label>
                                <input type="text" class="form-control" placeholder="Please enter here">

                                <label for="Requirement" style="font-weight: bold;">Requirement</label>
                                <input type="text" class="form-control" placeholder="Please enter here">


                                <hr>

                                <div class="dropdown">
                                    <!-- Custom Dropdown Toggle with Arrow Icon -->
                                    <div class="custom-dropdown-toggle" onclick="toggleDropdown()">
                                        Subcategory
                                        <!-- Arrow Icon (initially pointing down) -->
                                        <i id="dropdownArrow" class="fas fa-chevron-down" style="float: right;"></i>
                                    </div>

                                    <!-- Custom Dropdown Menu -->
                                    <div class="custom-dropdown-menu" id="dropdownMenu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>

                                <hr>

                                <div class="dropdown">
                                    <!-- Custom Dropdown Toggle with Arrow Icon -->
                                    <div class="custom-dropdown-toggle" onclick="toggleDropdown()">
                                        Width
                                        <!-- Arrow Icon (initially pointing down) -->
                                        <i id="dropdownArrow" class="fas fa-chevron-down" style="float: right;"></i>
                                    </div>
                                </div>

                                <hr>

                                <div class="dropdown">
                                    <!-- Custom Dropdown Toggle with Arrow Icon -->
                                    <div class="custom-dropdown-toggle" onclick="toggleDropdown()">
                                        Count
                                        <!-- Arrow Icon (initially pointing down) -->
                                        <i id="dropdownArrow" class="fas fa-chevron-down" style="float: right;"></i>
                                    </div>
                                </div>

                                <hr>

                                <div class="dropdown">
                                    <!-- Custom Dropdown Toggle with Arrow Icon -->
                                    <div class="custom-dropdown-toggle" onclick="toggleDropdown()">
                                        Reed
                                        <!-- Arrow Icon (initially pointing down) -->
                                        <i id="dropdownArrow" class="fas fa-chevron-down" style="float: right;"></i>
                                    </div>
                                </div>

                                <hr>

                                <div class="dropdown">
                                    <!-- Custom Dropdown Toggle with Arrow Icon -->
                                    <div class="custom-dropdown-toggle" onclick="toggleDropdown()">
                                        Pik
                                        <!-- Arrow Icon (initially pointing down) -->
                                        <i id="dropdownArrow" class="fas fa-chevron-down" style="float: right;"></i>
                                    </div>
                                </div>

                                <hr>

                                <textarea class="form-control" placeholder="Enter your message"
                                    id="exampleFormControlTextarea1" rows="3" style="height: 90px;"></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer d-flex justify-content-center  ">
                        <button class="btn-outline-success maincolor" type="submit">Submit</button>
                    </div>


                </div>
            </div>
        </div>
    </div>

@include('web.layouts.footer')

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