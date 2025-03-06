@extends('layouts.admin')

@section('title')
  Enquiry Details | 
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          Enquiry Details
          <a href="{{ route('admin.enquiry.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
        <form action="{{ route('admin.enquiry.update', $enquiry->id) }}" method="post" enctype='multipart/form-data'>
          @csrf @method('patch')
          <div class="card-body">
            <div class="row">
              @include('admin.enquiry.details')
              @if($enquiry->enquery_type == 'custom')
                @include('admin.enquiry.custom')
              @else
                @include('admin.enquiry.selected')
              @endif
            </div>
            <div class="row">
              <!-- Qutation -->
              <div class="form-group col-md-6 col-12 mb-3">
                @if($enquiry->status != 'invoked')
                <label for="name"> Upload Qutation</label>
                <input type="file" name="qutation" class="form-control">
                <br>
                @endif
                @if(@$enquiry->qutation)
                <div class="form-group col-12">
                  <h5>
                    <a href="{{asset($enquiry->qutation)}}" target="_blank" rel="noopener noreferrer">
                      <u><i>Download/View Uploaded Qutation</i></u>
                    </a>
                  </h5>
                </div>
                @endif
              </div>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-center">
            @if($enquiry->status != 'invoked')
              <button type="submit" class="btn btn-info">Save</button>
            @endif
            <a href="{{ route('admin.enquiry.index') }}" class="btn btn-secondary ms-3">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection