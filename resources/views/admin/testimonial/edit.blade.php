@extends('layouts.admin')

@section('title')
  Edit Testimonial | 
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          Edit Testimonial
          <a href="{{ route('admin.testimonial.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
        <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="post">
          @csrf @method('patch')
          @include('admin.testimonial.form')
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection