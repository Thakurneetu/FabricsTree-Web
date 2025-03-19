@extends('layouts.admin')

@section('title')
  Enquiry Details | 
@endsection

@section('style')
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
          Enquiry Details
          <a href="{{ route('admin.enquiry.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
       
          <div class="card-body">
            <div class="row">
              @include('admin.enquiry.details')
              @if($enquiry->enquery_type == 'custom')
                @include('admin.enquiry.custom')
              @else
                @include('admin.enquiry.selected')
              @endif
            </div>
            @if($enquiry->status != 'invoked')
            <form action="{{ route('admin.enquiry.update', $enquiry->id) }}" method="post" enctype='multipart/form-data'>
              @csrf @method('patch')
              <div class="row">
                <!-- Qutation -->
                <div class="form-group col-md-6 col-12 mb-3">
                  @if($enquiry->status != 'invoked')
                  <label for="name"> Upload Qutation</label>
                  <input type="file" name="qutation" class="form-control" required>
                  <br>
                  @endif
                  @if(@$enquiry->qutation)
                  <div class="form-group col-12">
                    <h5>
                      <a href="{{asset($enquiry->qutation)}}" target="_blank" rel="noopener noreferrer">
                        <u><i>Download/View Uploaded Qutation</i></u>
                      </a>
                    </h5>
                  </div>
                  @endif
                </div>
                <div class="form-group col-md-6 col-12 mb-3">
                  <button type="submit" class="btn btn-info mt-4">
                  @if(@$enquiry->qutation) Resend @else Send @endif to Customer
                  </button>
                </div>
              </div>
            </form>
            <form action="{{ route('admin.enquiry.update', $enquiry->id) }}" method="post" enctype='multipart/form-data'>
              @csrf @method('patch')
              <div class="row">
                <!-- Qutation -->
                <div class="form-group col-md-6 col-12 mb-3">
                  <label for="name"> Select Manufacturers To Get Qutation</label>
                  <select name="manufacturures[]" class="form-control select2" multiple="multiple" required>
                    @foreach($manufacturers as $manufacturer)
                    <option value="{{$manufacturer->id}}" {{ in_array($manufacturer->id, old('manufacturures', $enquiry->manufacturers->pluck('customer_id')->toArray() ?? [])) ? 'selected' : '' }}>{{$manufacturer->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6 col-12 mb-3">
                  <button type="submit" class="btn btn-info mt-4">
                    Send to Manufacturers
                  </button>
                </div>
              </div>
            </form>
            @include('admin.enquiry.qutations')
          </div>
          @endif
          <div class="card-footer d-flex justify-content-center">
            <a href="{{ route('admin.enquiry.index') }}" class="btn btn-secondary ms-3">Back</a>
          </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
   jQuery(document).ready(function() {
      jQuery('.select2').select2({
        placeholder: 'Select Manufacturers',
        tags: true,
        allowClear: true,
        theme: 'classic'
      });
    });
  </script>
@endsection