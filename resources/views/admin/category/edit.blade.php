@extends('layouts.admin')

@section('title')
  Edit Category | 
@endsection

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Category list</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          Edit Category
          <a href="{{ route('admin.category.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
        <form action="{{ route('admin.category.update', $category->id) }}" method="post">
          @csrf @method('patch')
          @include('admin.category.form')
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection