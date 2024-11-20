@extends('layouts.admin')

@section('title')
  Edit Customer | 
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          Edit Customer
          <a href="{{ route('admin.customer.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
        <form action="{{ route('admin.customer.update', $customer->id) }}" method="post">
          @csrf @method('patch')
          @include('admin.customer.form')
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection