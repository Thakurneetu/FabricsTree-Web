@extends('layouts.admin')

@section('title')
  Edit Tag | 
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          Edit Tag
          <a href="{{ route('admin.tag.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
        <form action="{{ route('admin.tag.update', $tag->id) }}" method="post">
          @csrf @method('patch')
          @include('admin.tag.form')
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection