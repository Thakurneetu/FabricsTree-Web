<div class="card-body">
  <div class="row">
    <!-- Name -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Name</label>
      <input type="text" name="name" required value="{{old('name') ?? (@$testimonial->name ?? '')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Testimonial Name">
      @error('name')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Designation -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Designation</label>
      <input type="text" name="designation" value="{{old('designation') ?? (@$testimonial->designation ?? '')}}" class="form-control @error('designation') is-invalid @enderror" placeholder="Enter Designation">
      @error('designation')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Rating -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Rating</label>
      <input type="number" min="1" max="5" name="rating" step="any" value="{{old('rating') ?? (@$testimonial->rating ?? '')}}" class="form-control @error('rating') is-invalid @enderror" placeholder="Enter Rating">
      @error('rating')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Comment -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name">Comment</label>
      <textarea name="comment" placeholder="Enter Comment"
      class="form-control">{{old('comment') ?? (@$testimonial->comment ?? '')}}</textarea>
      @error('comment')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Image -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="name"> Image</label>
      <input type="file" name="image" class="form-control">
      <br>
      @if(@$testimonial->image)
      <div class="row col-12 gallery">
        <div class="col-md-4 col-sm-6 position-relative">
          <img src="{{asset($testimonial->image)}}" alt="Tesimonial" class="img-fluid">
        </div>
      </div>
      @endif
    </div>
  </div>
</div>

<div class="card-footer d-flex justify-content-center">
  <button type="submit" class="btn btn-info">Save</button>
  <a href="{{ route('admin.testimonial.index') }}" class="btn btn-secondary ms-3">Cancel</a>
</div>
