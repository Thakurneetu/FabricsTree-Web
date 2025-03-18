@extends('layouts.admin')

@section('title')
  Product Details | 
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          Manufacturer Product Details
          <button onclick="window.history.back();" class="btn btn-dark btn-sm float-right">Back</button>
        </div>
        <div class="card-body">
          <table class="table table-borderless table-responsive-md">
            <colgroup>
              <col style="width: 20%;">
              <col style="width: 80%;">
            </colgroup>
            <tr>
              <th>Category:</th>
              <td>{{$product->category->name??''}}</td>
            </tr>
            <tr>
              <th>Subcategory:</th>
              <td>{{$product->subcategory->name??''}}</td>
            </tr>
            <tr>
              <th>Title:</th>
              <td>{{$product->title}}</td>
            </tr>
            <tr>
              <th>Width:</th>
              <td>{{$product->width}}</td>
            </tr>
            <tr>
              <th>Wrap:</th>
              <td>{{$product->wrap}}</td>
            </tr>
            <tr>
              <th>Weft:</th>
              <td>{{$product->weft}}</td>
            </tr>
            <tr>
              <th>Count:</th>
              <td>{{$product->count}}</td>
            </tr>
            <tr>
              <th>Reed:</th>
              <td>{{$product->reed}}</td>
            </tr>
            <tr>
              <th>Pik:</th>
              <td>{{$product->pick}}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
