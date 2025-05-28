<div class="card-body">
  <div class="row">
    <!-- Store Name -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label for="firm_name">Store Name</label>
      <input type="text" name="firm_name" value="{{old('firm_name') ?? (@$manufacturer->firm_name ?? '')}}" 
      class="form-control @error('firm_name') is-invalid @enderror" placeholder="Enter Store Name">
      @error('firm_name')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Name -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label for="name">Full Name</label>
      <input type="text" name="name" value="{{old('name') ?? (@$manufacturer->name ?? '')}}" 
      class="form-control @error('name') is-invalid @enderror" placeholder="Enter Full Name">
      @error('name')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Email -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label for="email">Email</label>
      <input type="email" name="email" value="{{old('email') ?? (@$manufacturer->email ?? '')}}" 
      class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email">
      @error('email')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Phone -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label for="phone">Phone</label>
      <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="10" minlength="10" 
      name="phone" value="{{old('phone') ?? (@$manufacturer->phone ?? '')}}" class="form-control @error('phone') is-invalid @enderror" 
      placeholder="Enter Phone Number">
      @error('phone')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Address -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label for="address">Address</label>
      <input type="text" name="address" value="{{old('address') ?? (@$manufacturer->address ?? '')}}" 
      class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address">
      @error('address')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Pincode -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label for="pincode">Pincode</label>
      <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="6" minlength="6" 
      name="pincode" value="{{old('pincode') ?? (@$manufacturer->pincode ?? '')}}" class="form-control @error('pincode') is-invalid @enderror" 
      placeholder="Enter Pincode">
      @error('pincode')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- GST -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label for="gst_number">GST</label>
      <input type="text" name="gst_number" value="{{old('gst_number') ?? (@$manufacturer->gst_number ?? '')}}" 
      class="form-control @error('gst_number') is-invalid @enderror" placeholder="Enter GST">
      @error('gst_number')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Store Contact -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label for="store_contact">Store Contact</label>
      <input type="text" name="store_contact" value="{{old('store_contact') ?? (@$manufacturer->store_contact ?? '')}}" 
      class="form-control @error('store_contact') is-invalid @enderror" placeholder="Enter Store Contact">
      @error('store_contact')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Password -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label for="password">Password {{@$manufacturer->name ? '(Enter To Reset)' : ''}}</label>
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
      @error('password')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group col-md-6 col-12 mb-6">
      <label for="store_logo">Store Logo</label>
      <input style="height: 1.8rem;" type="file" name="store_logo" id="store_logo" accept="image/*" class="form-control @error('store_logo') is-invalid @enderror" placeholder="upload store logo" title="{{ __('Store Logo') }}" value="{{ old('store_logo') }}">
      @error('store_logo')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      @if(@$manufacturer->store_logo)
      <img class="p-3" src="{{asset($manufacturer->store_logo)}}" alt="store logo" width="150">
      @else
      <img class="p-3" src="{{asset('frontend/images/Layer 2.png')}}" alt="store logo" width="150">
      @endif
    </div>
  </div>
</div>

<div class="card-footer d-flex justify-content-center">
  <button type="submit" class="btn btn-info">Save</button>
  <a href="{{ route('admin.manufacturer.index') }}" class="btn btn-secondary ms-3">Cancel</a>
</div>