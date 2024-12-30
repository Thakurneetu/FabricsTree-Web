@extends('layouts.admin')

@section('title')
  Edit Product | 
@endsection

@section('style')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="{{asset('css/coloris.min.css')}}" rel="stylesheet">
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
  <style>
    .gallery img {
      width: 100%;
      height: auto;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .gallery .col-md-4 {
      margin-bottom: 15px;
    }
    .color-box {
      width: 49px;
      height: 49px;
      display: inline-block;
      position: relative;
    }
    .remove-icon {
      position: absolute;
      top: -5px;
      right: -5px;
      background: black;
      color: white;
      border-radius: 50%;
      font-size: 14px;
      width: 20px;
      height: 20px;
      text-align: center;
      line-height: 16px;
      cursor: pointer;
    }
  </style>
@endsection

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          Edit Product
          <a href="{{ route('admin.product.index') }}" class="btn btn-dark btn-sm float-right">Back</a>
        </div>
        <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype='multipart/form-data'>
          @csrf @method('patch')
          @include('admin.product.form')
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="{{asset('js/coloris.min.js')}}"></script>
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

      Coloris({
        el: '.coloris',
        swatches: [
          '#264653',
          '#2a9d8f',
          '#e9c46a',
          '#f4a261',
          '#e76f51',
          '#d62828',
          '#023e8a',
          '#0077b6',
          '#0096c7',
          '#00b4d8',
          '#48cae4'
        ]
      });
      Coloris.setInstance('.coloris', {
        theme: 'polaroid',
        themeMode: 'dark',
        formatToggle: true,
        closeButton: true,
        clearButton: true,
      });
    });

    jQuery(document).on('click', '.remove-icon', function () {
      jQuery(this).parent('.color-box').remove();
    });

    function addColor(){
      let color = jQuery('#color').val();
      let colorBox = '<div class="color-box rounded me-2 mb-2" style="background-color:'+color+'">'
                    +'<div class="remove-icon">x</div>'
                    +'<input type="hidden" name="colors[]" value="'+color+'">'
                    +'</div>';
      jQuery("#color_div").append(colorBox);
    }

    function delete_image(id){
      swal({
        title:'Are you sure?',
        dangerMode: true,
        buttons: {  cancel: { text: "Cancel",visible:true, value: null, className: "bg-light"},
                    confirm: { text: "Delete", value: true, className: "bg-warning"},
                  },
        icon: "warning",
        text: 'Image will be deleted permanently!', 
        className: "btn-danger",
        closeModal: true
      })
      .then((willDelete) => {
        if (willDelete) {
          jQuery.ajax({
              method: "POST",
              url: "{{ route('admin.delete-product-image') }}",
              data: {_token: "{{csrf_token()}}", id: id},              
          })
          .done(function (response) {
            if(response.success)
            window.location.reload();
            else
            swal({title:response.message, timer: 2000, icon:"error"});
          })
          .fail(function (err) {
              console.log(err);              
          });
        }
      });
    }
  </script>
@endsection