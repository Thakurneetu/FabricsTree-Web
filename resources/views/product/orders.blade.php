@include('web.layouts.header')
<div class="banneerlogo">
        <div style="flex-direction: column;">
            <h1>My Orders</h1>
            <p><span>Home</span>/ My Orders</p>
        </div>
    </div>

    <div class="container">
        <section class="sectionlast p-2">


            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-12 mt-2 siedaemo">
                    <form name="filterFrom" method="post">
                        <div class="headparagraphbg">
                            <div class="MyQuotes p-2">
                                <div>My Orders</div>
                                <div><a href="{{ route('product.orders')}}" style="cursor:pointer;color: #78239B; text-decoration: underline; cursor:pointer;">Clear All</a></div>
                            </div>
                            <hr>

                            <div class="p-2">
                                <div class="form-check mt-3">
                                    <input class="form-check-input filterOrders" type="checkbox" name="orders_filter[]"
                                        id="flexRadioDefault1" value="All">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        All Orders
                                    </label>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input filterOrders" type="checkbox" name="orders_filter[]"
                                        id="flexRadioDefault2" value="Pending" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        New Order
                                    </label>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input filterOrders" type="checkbox" name="orders_filter[]"
                                        id="flexRadioDefault2" value="Revoked" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Revoked
                                    </label>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input filterOrders" type="checkbox" name="orders_filter[]"
                                        id="flexRadioDefault2" value="Dispatched">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        On The Way
                                    </label>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input filterOrders" type="checkbox" name="orders_filter[]"
                                        id="flexRadioDefault2" value="Delivered" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Delivered
                                    </label>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input filterOrders" type="checkbox" name="orders_filter[]"
                                        id="flexRadioDefault2" value="Returned" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Returned
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12" id="proHtml">
                    @include('product.ordersData') 
                </div>

        </section>
    </div>
@include('web.layouts.footer')

<script>

    $( document ).ready(function() {
      ordersList();
    
        $('.revoke_order').click(function () {
            $('#order_id').val($(this).attr('id'));
            $('#exampleModalRevokeOrder').modal('show');
        });


        $('.return_order').click(function () {
                var order_id = $(this).attr('id');
                if (confirm("Are you sure want to return this order?") == true) {  
                $.easyAjax({
                    url: "{{ route('product.returnorder') }}",
                    //container: '#revoke_order_form',
                    //type: "POST",
                    //redirect: true,
                    data: {'order_id':order_id},//$('#revoke_order_form').serialize(),
                    success: function(response) {
                    if (response.status) {
                        
                        swal("Sent!", response.message, "success");
                        setInterval(function () {
                            window.location.assign('{{ route("product.orders");}} ');
                        }, 3000);
                    }
                    }                    
                })
            }else{
                return false;
            }
        });
    });

    $('.filterOrders').change(function () {
        ordersList();
    });

    function ordersList()
    {
        var status = [];
        $.each($("input[name='orders_filter[]']:checked"), function() {
            status.push($(this).val());
        });
        status = status.join(",");
        console.log('status:'+status);

        $.easyAjax({
          url: "{{ route('product.ordersfilter') }}",
          type:'POST',
          data: {
            _token:$("input[name='_token']").val(),
            status:status,
          },
          success: function(response) {
            if (response.status) {
              //swal("Sent!", response.message, "success");
              $('#proHtml').html(response.data);

                $('.revoke_order').click(function () {
                    $('#order_id').val($(this).attr('id'));
                    $('#exampleModalRevokeOrder').modal('show');
                });


                $('.return_order').click(function () {
                        var order_id = $(this).attr('id');
                        if (confirm("Are you sure want to return this order?") == true) {  
                        $.easyAjax({
                            url: "{{ route('product.returnorder') }}",
                            //container: '#revoke_order_form',
                            //type: "POST",
                            //redirect: true,
                            data: {'order_id':order_id},//$('#revoke_order_form').serialize(),
                            success: function(response) {
                            if (response.status) {
                                
                                swal("Sent!", response.message, "success");
                                setInterval(function () {
                                    window.location.assign('{{ route("product.orders");}} ');
                                }, 3000);
                            }
                            }                    
                        })
                    }else{
                        return false;
                    }
                });  
              
            }
          }                    
        })
    }

</script>