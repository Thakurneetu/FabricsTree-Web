@extends('layouts.admin')

@section('title')
  Add Buyers |
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          Add Buyers
          <a href="{{ route('admin.customer.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
        <form action="{{ route('admin.customer.store') }}" method="post">
          @csrf
          @include('admin.customer.form')
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection
