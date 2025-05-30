@extends('layouts.admin')

@section('title')
  Edit Subcategory |
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          Edit Subcategory
          <a href="{{ route('admin.subcategory.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
        <form action="{{ route('admin.subcategory.update', $subcategory->id) }}" method="post">
          @csrf @method('patch')
          @include('admin.subcategory.form')
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection
