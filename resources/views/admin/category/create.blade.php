@extends('layouts.admin')

@section('title')
  Add Category |
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          Add Category
          <a href="{{ route('admin.category.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
        <form action="{{ route('admin.category.store') }}" method="post" enctype='multipart/form-data'>
          @csrf
          @include('admin.category.form')
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection
