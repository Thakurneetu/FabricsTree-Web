<div class="card-body">
  <div class="row">
    <!-- Name -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Name</label>
      <input type="text" name="name" value="{{old('name') ?? (@$category->name ?? '')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Category Name">
      @error('name')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Image -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name"> Image</label>
      <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
      @error('image')
      <div class="text-danger">{{ $message }}</div>
      @enderror
      <br>
      @if(@$category->image)
      <div class="row col-12 gallery">
        <div class="col-md-4 col-sm-6 position-relative">
          <img src="{{asset($category->image)}}" alt="Category" class="img-fluid">
        </div>
      </div>
      @endif
    </div>
  </div>
</div>

<div class="card-footer d-flex justify-content-center">
  <button type="submit" class="btn btn-info">Save</button>
  <a href="{{ route('admin.category.index') }}" class="btn btn-secondary ms-3">Cancel</a>
</div>
