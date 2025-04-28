@include('web.layouts.header')
<div class="banneerlogo">
        <div style="flex-direction: column;">
            <h1>Products</h1>
            <p><span>Home</span>/ Products</p>
        </div>
    </div>
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
      <form method="POST" id="filterFrom" name="filterFrom">
          @csrf
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
                    <input title="{{$category->name}}" class="form-check-input search_filter" type="checkbox" name="category_id[]" id="category_id_{{$category->id}}" value="{{$category->id}}">
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
              <div class="p-1" id="requirementsHtml">
                @foreach($requirements as $requirement)
                <div class="form-check mt-3">
                  <input title="{{$requirement->name}}" class="form-check-input search_filter" type="checkbox" name="requirement_id[]" id="requirement_id_{{$requirement->id}}" value="{{$requirement->id}}">
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
              <div class="p-1" id="subcategoriesHtml">
              @foreach($subcategories as $subcategory)
              <div class="form-check mt-3">
                <input title="{{$subcategory->name}}" class="form-check-input search_filter" type="checkbox" name="subcategory_id[]" id="subcategory_id_{{$subcategory->id}}" value="{{$subcategory->id}}">
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
                    <input class="form-check-input search_filter" type="checkbox" name="width[]" id="width_{{$width}}" value="{{$width}}">
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
                  <input class="form-check-input search_filter" type="checkbox" name="wrap[]" id="wrap_{{$wrap}}" value="{{$wrap}}">
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
                  <input class="form-check-input search_filter" type="checkbox" name="weft[]" id="weft_{{$weft}}" value="{{$weft}}">
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
                  <input class="form-check-input search_filter" type="checkbox" name="count[]" id="count_{{$count}}" value="{{$count}}">
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
                  <input class="form-check-input search_filter" type="checkbox" name="reed[]" id="reed_{{$reed}}" value="{{$reed}}">
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
                  <input class="form-check-input search_filter" type="checkbox" name="pick[]" id="pick_{{$pick}}" value="{{$pick}}">
                  <label class="form-check-label" for="flexRadioDefault1">
                  {{$pick}}
                  </label>
                </div>
              @endforeach
              </div>
            </li>
          </ul>
          <br/>
          @if($customer) 
            @if($customer->user_type=='Customer')
            <button class="btn-outline-success KnowMore maincolor" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCustomizeRequirement">Customize</button>
            @endif
          @else
          <button class="btn-outline-success KnowMore maincolor" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCustomizeRequirement">Customize</button>
          @endif
        </li>
      </ul>
      </form>
    </nav>

    <!-- Page Content  -->
    <div id="content">
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="container">

            <div class="headingbtn">
              <hr>
              <div class="headingbtn d-flex justify-content-between">
                <div id="filterVal">
                  <!-- <button type="button" class="btn btn-outline-dark">Cotton &nbsp;<i class="fa fa-times" aria-hidden="true"></i></button> -->
                </div>
                <div style="color: #78239B; text-decoration: underline; cursor:pointer;" id="resetFilter">
                  <a href="{{route('product.index')}}" style="color: #78239B;">Reset All</a>
                </div>
              </div>
              <hr>
            </div>
            <div class="row Productscat mt-4" id="proHtml">
                 @include('product.productData') 
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
                          <form id="customForm" method="POST">
                          @csrf
                            <div class="mb-3 registerss">
                            
                                <label for="FabricCategory" style="font-weight: bold;">Category</label>
                                <select class="form-control" id="ccategory" name="category_id" >
                                  <option value="">Select Category</option>
                                  @foreach($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                  @endforeach
                                </select>
                                <br/>
                                <label for="FabricCategory" style="font-weight: bold;">Sub Category</label>
                                <select class="form-control" id="csub_category" name="subcategory_id" >
                                  <option value="">Select Sub Category</option>
                                  @foreach($subcategories as $subcategory)
                                  <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                  @endforeach
                                </select>
                                <br/>      
                                <label for="FabricCategory" style="font-weight: bold;">Width</label>
                                <input type="text" id="cwidth" name="width" placeholder="Please enter width" class="form-control"/>

                                <label for="FabricCategory" style="font-weight: bold;">Warp</label>
                                <input type="text" id="cwrap" name="wrap" placeholder="Please enter wrap" class="form-control"/>

                                <label for="FabricCategory" style="font-weight: bold;">Weft</label>
                                <input type="text" id="cweft" name="weft" placeholder="Please enter weft" class="form-control"/>

                                <label for="FabricCategory" style="font-weight: bold;">Count</label>
                                <input type="text" id="ccount" name="count" placeholder="Please enter count" class="form-control"/>
                                
                                <label for="FabricCategory" style="font-weight: bold;">Reed</label>
                                <input type="text" id="creed" name="reed" placeholder="Please enter reed" class="form-control"/>

                                <label for="FabricCategory" style="font-weight: bold;">Pick</label>
                                <input type="text" id="cpick" name="pick" placeholder="Please enter pick" class="form-control"/>
                                <br/>
                                <textarea class="form-control" placeholder="Please enter your message"
                                    id="cmessage" name="message" rows="3" style="height: 90px;"></textarea>
                            </div>
                          </form>
                        </div>

                    </div>

                    <div class="modal-footer d-flex justify-content-center  ">
                        <button class="btn-outline-success maincolor" type="button" id="customize">Submit</button>
                    </div>


                </div>
            </div>
        </div>
    </div>

@include('web.layouts.footer')
<!-- 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
      $('#customize').click(function () {
      
      $.easyAjax({
        url: "{{ route('product.requestaquotes') }}",
        //container: '#customForm',
        type: "POST",
       // redirect: true,
        data: {
          '_token':$("input[name='_token']").val(),
          'enquery_type':'custom',
          'category_id' : $('#ccategory').val(),
          'subcategory_id' : $('#csub_category').val(),
          'width' : $('#cwidth').val(),
          'wrap' : $('#cwrap').val(),
          'weft' : $('#cweft').val(),
          'count' : $('#ccount').val(),
          'reed' : $('#creed').val(),
          'pick' : $('#cpick').val(),
          'message' : $('#cmessage').val(),
        },
        success: function(response) {
          if (response.status) {
            
            $('#exampleModalCustomizeRequirement').modal('hide');

            $('#exampleModalThankuinterest').modal('show');

            //swal("Sent!", response.message, "success");
            setInterval(function () {
                window.location.assign('{{ route("product.index");}} ');
            }, 5000);
          }else{
            swal("Error!", response.message, "error");
          }
        }                    
      })
      
    });

      $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#sidebarCollapse').find('#collapseIcon').toggleClass('fa-arrow-left').toggleClass('fa-arrow-right');
      });
      search_filter();
      $("#filterVal").html('');
      $('.search_filter').change(function () {  
        search_filter();
      });

      // $('#resetFilter').click(function () { 
      //   $("#filterVal").html('') ;
      //   //search_filter();
      // });

      function search_filter(){
        $("#filterVal").html('&nbsp;');
        var categoryId = [];
        var categoryhtml = [];
        $.each($("input[name='category_id[]']:checked"), function() {
          categoryId.push($(this).val());
          categoryhtml.push($(this).attr('title'));
        });

        if(categoryId!=""){
          $.easyAjax({
            url: "{{ route('subcategories') }}",
            type: "POST",
            data: {
              _token:$("input[name='_token']").val(),
              categoryId:categoryId
            },
            success: function(response) {
              if (response.status) {
                $('#subcategoriesHtml').html(response.data);
              }
            }                    
          })

          $.easyAjax({
            url: "{{ route('requirements') }}",
            type: "POST",
            data: {
              _token:$("input[name='_token']").val(),
              categoryId:categoryId
            },
            success: function(response) {
              if (response.status) {
                $('#requirementsHtml').html(response.data);
              }
            }                    
          })
        }

        //categoryId = categoryId.join(",");
        categoryhtml = categoryhtml.join(",");
        //console.log('categoryId:'+categoryId);
        if(categoryhtml!=""){
          $("#filterVal").append('<button type="button" class="btn btn-outline-dark">Category:'+categoryhtml+' &nbsp;<i class="fa fa-times" aria-hidden="true"></i></button>');
        }


        var requirementId = [];
        var requirementhtml = [];
        $.each($("input[name='requirement_id[]']:checked"), function() {
          requirementId.push($(this).val());
          requirementhtml.push($(this).attr('title'));
        });
        //requirementId = requirementId.join(",");
        requirementhtml = requirementhtml.join(",");
        //console.log('requirementId:'+requirementId);
        if(requirementhtml!=""){
          $("#filterVal").append('<button type="button" class="btn btn-outline-dark">Requirement:'+requirementhtml+' &nbsp;<i class="fa fa-times" aria-hidden="true"></i></button>');
        }


        var subcategoryId = [];
        var subcategoryhtml = [];
        $.each($("input[name='subcategory_id[]']:checked"), function() {
          subcategoryId.push($(this).val());
          subcategoryhtml.push($(this).attr('title'));
        });
       // subcategoryId = subcategoryId.join(",");
        subcategoryhtml = subcategoryhtml.join(",");
        //console.log('subcategoryId:'+subcategoryId);
        if(subcategoryhtml!=""){
          $("#filterVal").append('<button type="button" class="btn btn-outline-dark">Sub Category:'+subcategoryhtml+' &nbsp;<i class="fa fa-times" aria-hidden="true"></i></button>');
        }


        var width = [];
        $.each($("input[name='width[]']:checked"), function() {
          width.push($(this).val());
        });
       // width = width.join(",");
        //console.log('width:'+width);

        if(width!=""){
          $("#filterVal").append('<button type="button" class="btn btn-outline-dark">Width:'+width+' &nbsp;<i class="fa fa-times" aria-hidden="true"></i></button>');
        }

        var wrap = [];
        $.each($("input[name='wrap[]']:checked"), function() {
          wrap.push($(this).val());
        });
        //wrap = wrap.join(",");
        //console.log('wrap:'+wrap);
        if(wrap!=""){
          $("#filterVal").append('<button type="button" class="btn btn-outline-dark">Wrap:'+wrap+' &nbsp;<i class="fa fa-times" aria-hidden="true"></i></button>');
        }


        var weft = [];
        $.each($("input[name='weft[]']:checked"), function() {
          weft.push($(this).val());
        });
        //weft = weft.join(",");
        //console.log('weft:'+weft);
        if(weft!=""){
          $("#filterVal").append('<button type="button" class="btn btn-outline-dark">Weft:'+weft+' &nbsp;<i class="fa fa-times" aria-hidden="true"></i></button>');
        }


        var count = [];
        $.each($("input[name='count[]']:checked"), function() {
          count.push($(this).val());
        });
        //count = count.join(",");
        //console.log('count:'+count);
        if(count!=""){
          $("#filterVal").append('<button type="button" class="btn btn-outline-dark">Count:'+count+' &nbsp;<i class="fa fa-times" aria-hidden="true"></i></button>');
        }


        var reed = [];
        $.each($("input[name='reed[]']:checked"), function() {
          reed.push($(this).val());
        });
        //reed = reed.join(",");
        //console.log('reed:'+reed);
        if(reed!=""){
          $("#filterVal").append('<button type="button" class="btn btn-outline-dark">Reed:'+reed+' &nbsp;<i class="fa fa-times" aria-hidden="true"></i></button>');
        }


        var pick = [];
        $.each($("input[name='pick[]']:checked"), function() {
          pick.push($(this).val());
        });
        //pick = pick.join(",");
        //console.log('pick:'+pick);
        if(pick!=""){
          $("#filterVal").append('<button type="button" class="btn btn-outline-dark">Pick:'+pick+' &nbsp;<i class="fa fa-times" aria-hidden="true"></i></button>');
        }

        if(categoryhtml=="" && requirementId=="" && subcategoryId=="" && width=="" && wrap=="" && weft=="" && count=="" && reed=="" && pick==""){
          $("#filterVal").html('');
        }
        $.easyAjax({
          url: "{{ route('product.filter') }}",
          container: '#filterFrom',
          type: "POST",
          redirect: true,
          data: {
            _token:$("input[name='_token']").val(),
            categoryId:categoryId,
            requirementId:requirementId,
            subcategoryId:subcategoryId,
            width:width,
            wrap:wrap,
            weft:weft,
            count:count,
            reed:reed,
            pick:pick
          },
          success: function(response) {
            if (response.status) {//alert(response.data);
              //swal("Sent!", response.message, "success");
              $('#proHtml').html(response.data);
              $('.add_to_cart').click(function () {
                var id = $(this).attr('productid');
                var qty = 1;//$this.attr('quantity').val();
                add_to_cart(id,qty);
              });
            }
          }                    
        })
      }

    });

  </script>