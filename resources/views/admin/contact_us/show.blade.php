@extends('layouts.admin')

@section('title')
  View Message | 
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          View Message
          <a href="{{ route('admin.contact-us.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="form-group col-12 mb-3">
              <label for="name">Name:</label> {{$contactUs->name}}
            </div>
            <div class="form-group col-12 mb-3">
              <label for="name">Email:</label> {{$contactUs->email}}
            </div>
            <div class="form-group col-12 mb-3">
              <label for="name">Phone:</label> {{$contactUs->phone}}
            </div>
            <div class="form-group col-12 mb-3">
              <label for="name">Message:</label> {{$contactUs->message}}
            </div>
            <div class="form-group col-12 mb-3">
              <label for="name">Status:</label> {{ucfirst($contactUs->status)}}
            </div>
            @if($contactUs->status == 'pending')
            <div class="form-group col-12 mb-3">
              <button class="btn btn-success text-white" onclick="reviewed({{$contactUs->id}})">Mark as Reviewed</button>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
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