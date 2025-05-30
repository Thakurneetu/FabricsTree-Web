@extends('layouts.admin')

@section('title')
Contact Us |
@endsection

@section('style')
  @include('layouts.includes.datatablesCss')
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            Contact Us List
          </div>
          <div class="card-body">
          {!! $dataTable->table(['class' => 'table table-striped'], false) !!}
          </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  @include('layouts.includes.datatablesJs')
  <script>
  function reviewed(id){
    swal({
      title:'Are you sure?',
      // timer: 3000,
      buttons: {  cancel: { text: "Cancel",visible:true, value: null, className: "bg-light"},
                  confirm: { text: "Yes Reviewed", value: true, className: "bg-warning"},
                },
      icon: "warning",
      text: 'Message will be marked as reviewed!',
      className: "btn-danger",
      closeModal: true
    })
    .then((reviewed) => {
      if (reviewed) {
        jQuery.ajax({
            method: "PUT",
            url: "{{ route('admin.contact-us.index') }}/"+id,
            data: {_token: "{{csrf_token()}}", status: 'reviewed'},
        })
        .done(function (response) {
          if(response.success)
          window.location.reload();
          else
          swal({title:response.message, timer: 2000, icon:"error"});
        })
        .fail(function (err) {
            console.log(err);
        });
      }
    });
  }
</script>
@endsection
