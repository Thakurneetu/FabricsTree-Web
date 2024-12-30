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
            <!-- <div class="form-group col-12 mb-3">
              <label for="name">Status:</label> {{ucfirst($contactUs->status)}}
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection