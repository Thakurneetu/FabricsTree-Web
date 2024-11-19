@extends('layouts.admin')

@section('style')
  @include('layouts.includes.datatablesCss') 
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card">
            <div class="card-header">Manage Customers</div>
            <div class="card-body">
            {!! $dataTable->table(['class' => 'table table-bordered table-striped dataTable dtr-inline'], false) !!}
            </div>
        </div>
    </div>
  </div>
@endsection

@section('script')
  @include('layouts.includes.datatablesJs') 
  @include('layouts.includes.deleteFunction')
@endsection