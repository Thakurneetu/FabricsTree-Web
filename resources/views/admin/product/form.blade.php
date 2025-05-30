<div class="card-body">
  <div class="row">
    <!-- Name -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Product Name</label>
      <input type="text" name="title" value="{{old('title') ?? (@$product->title ?? '')}}" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Product Name">
      @error('title')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Subtitle -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Product Subtitle</label>
      <input type="text" name="subtitle" value="{{old('subtitle') ?? (@$product->title ?? '')}}" class="form-control @error('subtitle') is-invalid @enderror" placeholder="Enter Product Subtitle">
      @error('subtitle')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Ctaegory -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Select Category</label>
      <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
        <option value="" selected disabled>Select Category</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}" {{old('category_id', @$product->category_id) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
        @endforeach
      </select>
      @error('category_id')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Requirement -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Select Requirement</label>
      <select name="requirement_id" class="form-control @error('requirement_id') is-invalid @enderror">
        <option value="" selected disabled>Select Requirement</option>
        @foreach($requirements as $requirement)
        <option value="{{$requirement->id}}" {{old('requirement_id', @$product->requirement_id) == $requirement->id ? 'selected' : '' }}>{{$requirement->name}}</option>
        @endforeach
      </select>
      @error('requirement_id')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- SubCtaegory -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Select SubCategory</label>
      <select name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
        <option value="" selected disabled>Select SubCategory</option>
        @foreach($subcategories as $subcategory)
        <option value="{{$subcategory->id}}" {{old('subcategory_id', @$product->subcategory_id) == $subcategory->id ? 'selected' : '' }}>{{$subcategory->name}}</option>
        @endforeach
      </select>
      @error('subcategory_id')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    {{--
    <!-- Tags -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Select Tags</label>
      <select name="tag_ids[]" class="form-control select2" multiple="multiple">
        @foreach($tags as $tag)
        <option value="{{$tag->id}}" {{ in_array($tag->id, old('tag_ids', @$product?->tags()->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>{{$tag->name}}</option>
        @endforeach
      </select>
    </div>
    --}}
    <!-- Width -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Product Width</label>
      <input type="text" name="width" value="{{old('width') ?? (@$product->width ?? '')}}" class="form-control @error('width') is-invalid @enderror" placeholder="Enter Product Width">
      @error('width')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Wrap -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Product Wrap</label>
      <input type="text" name="wrap" value="{{old('wrap') ?? (@$product->wrap ?? '')}}" class="form-control @error('wrap') is-invalid @enderror" placeholder="Enter Product Wrap">
      @error('wrap')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Weft -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Product Weft</label>
      <input type="text" name="weft" value="{{old('weft') ?? (@$product->weft ?? '')}}" class="form-control @error('weft') is-invalid @enderror" placeholder="Enter Product Weft">
      @error('weft')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Count -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Product Count</label>
      <input type="text" name="count" value="{{old('count') ?? (@$product->count ?? '')}}" class="form-control @error('count') is-invalid @enderror" placeholder="Enter Product Count">
      @error('count')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Reed -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Product Reed</label>
      <input type="text" name="reed" value="{{old('reed') ?? (@$product->reed ?? '')}}" class="form-control @error('reed') is-invalid @enderror" placeholder="Enter Product Reed">
      @error('reed')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Pick -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Product Pik</label>
      <input type="text" name="pick" value="{{old('pick') ?? (@$product->pick ?? '')}}" class="form-control @error('pick') is-invalid @enderror" placeholder="Enter Product Pick">
      @error('pick')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Description -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Product Description</label>
      <textarea class="form-control summernote" name="description" rows="3" placeholder="Product Description" >{{old('description') ?? @$product->description}}</textarea>
      @error('description')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Key Features -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Product Key Features</label>
      <textarea class="form-control summernote" name="key_features" rows="3" placeholder="Product Key Features" >{{old('key_features') ?? @$product->key_features}}</textarea>
      @error('key_features')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Disclaimer -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Product Disclaimer</label>
      <textarea class="form-control summernote" name="disclaimer" rows="3" placeholder="Product Disclaimer" >{{old('disclaimer') ?? @$product->disclaimer}}</textarea>
      @error('disclaimer')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Colors -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Product Colors</label>
      <div class="example square">
        <input type="text" class="coloris" value="#1369d2" id="color">
      </div>
      <button type="button" onclick="addColor()" class="btn btn-sm btn-info mt-3">Add This Color</button>
      <div class="d-flex flex-wrap mt-3 ps-2 pt-2" style="background:white;border-radius: 5px;min-height: 66px;" id="color_div">
        @if(isset($product) && count($product->colors) > 0)
          @foreach($product->colors as $color)
            <div class="color-box rounded me-2 mb-2" style="background-color:{{$color->code}}">
              <div class="remove-icon">x</div>
              <input type="hidden" name="colors[]" value="{{$color->code}}">
            </div>
          @endforeach
        @endif
      </div>
    </div>
    <!-- Images -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Product Images</label>
      <input type="file" name="images[]" multiple="multiple" class="form-control @error('images') is-invalid @enderror">
      @error('images')
      <div class="text-danger">{{ $message }}</div>
      @enderror
      <br>
      @if(isset($product) && count($product->images) > 0)
      <div class="row col-12 gallery">
        @foreach($product->images as $image)
        <div class="col-md-4 col-sm-6 position-relative">
          <div class="position-absolute" style="right:20px;top:4px;" >
            <button class="btn bg-light px-1 py-0 m-0 rounded" onclick="delete_image({{$image->id}})">
              <i class="text-danger icon cil-trash"></i>
            </button>
          </div>
          <img src="{{asset($image->path)}}" alt="Gallery 1" class="img-fluid">
        </div>
        @endforeach
      </div>
      @endif
    </div>
  </div>
</div>

<div class="card-footer d-flex justify-content-center">
  <button type="submit" class="btn btn-info">Save</button>
  <a href="{{ route('admin.product.index') }}" class="btn btn-secondary ms-3">Cancel</a>
</div>
