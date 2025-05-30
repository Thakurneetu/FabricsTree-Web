@extends('layouts.admin')

@section('title')
  Add Requirement |
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          Add Requirement
          <a href="{{ route('admin.requirement.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
        <form action="{{ route('admin.requirement.store') }}" method="post">
          @csrf
          @include('admin.requirement.form')
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection
