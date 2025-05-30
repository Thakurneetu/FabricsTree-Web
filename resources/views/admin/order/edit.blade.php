@extends('layouts.admin')

@section('title')
Order Details |
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
        Order Details
          <a href="{{ route('admin.order.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
        <form action="{{ route('admin.order.update', $order->id) }}" method="post" enctype='multipart/form-data'>
          @csrf @method('patch')
          <div class="card-body">
            <div class="row">
              @include('admin.order.details')
              @include('admin.order.items')
            </div>
          </div>
          <div class="card-footer d-flex justify-content-center">
            @if($order->status != 'cancelled')
              <button type="submit" class="btn btn-info">Update Details</button>
            @endif
            <a href="{{ route('admin.order.index') }}" class="btn btn-secondary ms-3">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection
