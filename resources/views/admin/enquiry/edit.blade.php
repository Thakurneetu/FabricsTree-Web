@extends('layouts.admin')

@section('title')
  Enquiry Details |
@endsection

@section('style')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css"
   integrity="sha512-aD9ophpFQ61nFZP6hXYu4Q/b/USW7rpLCQLX6Bi0WJHXNO7Js/fUENpBQf/+P4NtpzNX0jSgR5zVvPOJp+W2Kg=="
   crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <h5>Step-1: Assign at least One Manufacturer </h5>
            <form action="{{ route('admin.enquiry.update', $enquiry->id) }}" method="post" enctype='multipart/form-data'>
              @csrf @method('patch')
              <input type="hidden" name="manufacturur_assign" value="1">
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
                  <button type="submit" class="btn btn-info mt-4" onclick="return confirm('Are you sure want to update?');">
                    Assign Manufacturers
                  </button>
                </div>
              </div>
            </form>
            
            @if($enquiry->manufacturers->pluck('customer_id')->toArray())

                <br><hr><br>
                <h5>Step-2: Select at least One Qutation Received of Manufacturer  </h5>
                @include('admin.enquiry.qutations')
                

                @if(count($enquiry->manufacturers->whereNotNull('qutation')) > 0)
                  @if($enquiry->manufacturer_id!="")
                  <br><hr><br>
                  <h5>Step-3: Upload Qutation to Customer </h5>
                  <form action="{{ route('admin.enquiry.update', $enquiry->id) }}" method="post" enctype='multipart/form-data'>
                    @csrf @method('patch')
                    <div class="row">
                      <!-- Qutation -->
                      <div class="form-group col-md-6 col-12 mb-3">
                        @if($enquiry->status != 'invoked')
                        <label for="name"> Upload Qutation</label>
                        <input type="file" name="qutation" id="qutation" class="form-control" required accept="image/*,application/pdf" onchange="validateFileType()">
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
                        <button type="submit" class="btn btn-info mt-4" onclick="return confirm('Are you sure want to @if(@$enquiry->qutation) Resend @else Send @endif to Customer?');">
                        @if(@$enquiry->qutation) Resend @else Send @endif to Customer
                        </button>
                      </div>
                    </div>
                  </form>
                  @endif
                @endif

            @endif
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"
  integrity="sha512-4MvcHwcbqXKUHB6Lx3Zb5CEAVoE9u84qN+ZSMM6s7z8IeJriExrV3ND5zRze9mxNlABJ6k864P/Vl8m0Sd3DtQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"></script>
  <script>

function validateFileType() {
     var selectedFile = document.getElementById('qutation').files[0];
     var allowedTypes = ['image/jpeg', 'image/png','image/jpg','image/gif','application/pdf'];
     if (!allowedTypes.includes(selectedFile.type)) {
        swal("Error!", 'Invalid file type. Please upload a JPEG,JPG PNG,GIF or PDF file.', "error");
        document.getElementById('qutation').value = '';
     }
  }

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
