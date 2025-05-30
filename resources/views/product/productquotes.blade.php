@include('web.layouts.header')
<div class="banneerlogo">
        <div style="flex-direction: column;">
            <h1>My Quotes</h1>
            <p><span>Home</span>/ My Quotes</p>
        </div>
    </div>

    <div class="container">
        
        <section class="sectionlast p-2">


            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-12 mt-2 siedaemo">
                    <form name="filterFrom" method="post">
                        <div class="headparagraphbg">
                            <div class="MyQuotes p-2">
                                <div>My Quotes</div>
                                <div><a href="{{ route('product.productquotes')}}" style="cursor:pointer;color: #78239B; text-decoration: underline; cursor:pointer;">Clear All</a></div>
                            </div>
                            <hr>

                            <div class="p-2">
                                <div class="form-check mt-3">
                                    <input class="form-check-input filterQuote" type="checkbox" name="quotes_filter[]"
                                        id="flexRadioDefault1" value="all">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        All Quotes
                                    </label>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input filterQuote" type="checkbox" name="quotes_filter[]"
                                        id="flexRadioDefault2" value="submitted">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Quotes not Received
                                    </label>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input filterQuote" type="checkbox" name="quotes_filter[]"
                                        id="flexRadioDefault3" value="accepted">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        Closed
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12" id="proHtml">
                 @include('product.quotesData')
                </div>
                
        </section>
    </div>
@include('web.layouts.footer')

<script>
    $( document ).ready(function() {
      quoteList();

        $('.revoke_quote').click(function () {
            $('#enquiry_id').val($(this).attr('id'));
            $('#exampleModalRevokeQuote').modal('show');
        });

        $('.upload_quote').click(function () {
            $('#upload_enquiry_id').val($(this).attr('id'));
            $('#exampleModalUploadQuote').modal('show');
        });
    });

    $('.filterQuote').change(function () {
        quoteList();
    });

    function quoteList()
    {
        var status = [];
        $.each($("input[name='quotes_filter[]']:checked"), function() {
            status.push($(this).val());
        });
        status = status.join(",");
        console.log('status:'+status);
        if(status==""){
            status = 'all';
        }
        $.easyAjax({
          url: "{{ route('product.requestaquotesfilter') }}",
          type:'POST',
          data: {
            _token:$("input[name='_token']").val(),
            status:status,
          },
          success: function(response) {
            if (response.status) {
              //swal("Sent!", response.message, "success");
              $('#proHtml').html(response.data);

                $('.revoke_quote').click(function () {
                    $('#enquiry_id').val($(this).attr('id'));
                    $('#exampleModalRevokeQuote').modal('show');
                });

                $('.upload_quote').click(function () {
                    $('#upload_enquiry_id').val($(this).attr('id'));
                    $('#exampleModalUploadQuote').modal('show');
                });
              
            }
          }
        })
    }
</script>
