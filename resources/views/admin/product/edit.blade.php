@extends('layouts.admin')

@section('title')
  Edit Product | 
@endsection

@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  @if(Auth::user()->theme != 'light')
    <style>
      .select2-container--classic .select2-selection--multiple {
          background-color: #212631;
          border: 1px solid #323A49;
          border-radius: 4px;
          cursor: text;
          outline: 0;
          padding-bottom: 5px;
          padding-right: 5px;
      }
      .select2-container--classic .select2-selection--multiple .select2-selection__choice {
          background-color: #212631;
          border: 1px solid #aaa;
          border-radius: 4px;
          display: inline-block;
          margin-left: 5px;
          margin-top: 5px;
          padding: 0;
      }
      .select2-results__option--selectable {
          cursor: pointer;
          background-color: #212631;
      }
      .select2-container--classic .select2-search--inline .select2-search__field {
        background-color: #212631;
        color: #000;
        caret-color: white;
        min-height: 27px;
      }
    </style>
  @endif
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          Edit Product
          <a href="{{ route('admin.product.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
        <form action="{{ route('admin.product.update', $product->id) }}" method="post">
          @csrf @method('patch')
          @include('admin.product.form')
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    jQuery(document).ready(function() {
      jQuery('.select2').select2({
        placeholder: 'Select Tags',
        tags: true,
        allowClear: true,
        theme: 'classic'
      });
      jQuery.getScript('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js', function () 
       { jQuery('.summernote').summernote(); });
    });
  </script>
@endsection