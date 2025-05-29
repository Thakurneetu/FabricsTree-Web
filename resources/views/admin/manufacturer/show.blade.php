@extends('layouts.admin')

@section('title')
  Manufacturer Details | 
@endsection

@section('style')
  @include('layouts.includes.datatablesCss') 
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          Manufacturer Details
          <a href="{{ route('admin.manufacturer.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
        <div class="card-body">
          <ul class="nav nav-pills mb-3" id="pills-tab">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-home-tab" data-coreui-toggle="pill" data-coreui-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Details</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-profile-tab" data-coreui-toggle="pill" data-coreui-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Products</button>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <table class="table table-borderless table-responsive-md">
                <colgroup>
                  <col style="width: 20%;">
                  <col style="width: 80%;">
                </colgroup>
                <tr>
                  <th>Name:</th>
                  <td>{{$manufacturer->name}}</td>
                </tr>
                <tr>
                  <th>Phone:</th>
                  <td>{{$manufacturer->phone}}</td>
                </tr>
                <tr>
                  <th>Email:</th>
                  <td>{{$manufacturer->email}}</td>
                </tr>
                <tr>
                  <th>Address:</th>
                  <td>{{$manufacturer->address.', '.$manufacturer->pincode}}</td>
                </tr>
                <tr>
                  <th>Store Name:</th>
                  <td>{{$manufacturer->firm_name}}</td>
                </tr>
                <tr>
                  <th>Store Contact:</th>
                  <td>{{$manufacturer->store_contact}}</td>
                </tr>
                <tr>
                  <th>GST Number:</th>
                  <td>{{$manufacturer->gst_number}}</td>
                </tr>
                <tr>
                <th>Store Logo:</th>
                  <td>
                    @if($manufacturer->store_logo)
                    <img class="p-3" src="{{asset($manufacturer->store_logo)}}" alt="store logo" width="150">
                    @else
                    <img class="p-3" src="{{asset('frontend/images/Layer 2.png')}}" alt="store logo" width="150">
                    @endif
                  </td>
                </tr>
              </table>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            {!! $dataTable->table(['class' => 'table table-striped'], false) !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  @include('layouts.includes.datatablesJs')
@endsection