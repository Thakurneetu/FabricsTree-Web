@extends('layouts.admin')

@section('title')
  Custom Enquiry Details |
@endsection


@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          Custom Enquiry Details
          <a href="{{ route('admin.custom-enquiry.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
          <div class="card-body">
            <div class="row">
              @include('admin.custom_enquiry.details')
              @include('admin.custom_enquiry.custom')
            </div>
          </div>
          <div class="card-footer d-flex justify-content-center">
          @if($enquiry->status == 'submitted')
            <form action="{{ route('admin.custom-enquiry.update', $enquiry->id) }}" method="post" enctype='multipart/form-data'>
              @csrf @method('patch')
              <input type="hidden" name="status" value="accepted">
              <button class="btn btn-success">Mark as Reviewed</button>
            </form>
          @endif
            <a href="{{ route('admin.custom-enquiry.index') }}" class="btn btn-secondary ms-3">Back</a>
          </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
   jQuery(document).ready(function() {
      jQuery('.select2').select2({
        placeholder: 'Select Manufacturers',
        tags: true,
        allowClear: true,
        theme: 'classic'
      });
    });
  </script>
@endsection
