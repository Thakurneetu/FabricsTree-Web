<div class="card-body">
  <div class="row">
    <!-- Store Name -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label>Store Name</label>
      <input type="text" required name="store_name" value="{{old('store_name') ?? (@$manufacturer->store_name ?? '')}}" 
      class="form-control @error('store_name') is-invalid @enderror" placeholder="Enter Store Name">
      @error('store_name')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Name -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label>Full Name</label>
      <input type="text" required name="name" value="{{old('name') ?? (@$manufacturer->name ?? '')}}" 
      class="form-control @error('name') is-invalid @enderror" placeholder="Enter Full Name">
      @error('name')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Email -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label>Email</label>
      <input type="email" required name="email" value="{{old('email') ?? (@$manufacturer->email ?? '')}}" 
      class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email">
      @error('email')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Phone -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label>Phone</label>
      <input type="text" required oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="10" minlength="10" 
      name="phone" value="{{old('phone') ?? (@$manufacturer->phone ?? '')}}" class="form-control @error('phone') is-invalid @enderror" 
      placeholder="Enter Phone Number">
      @error('phone')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Address -->
    <div class="form-group col-md-6 col-12 mb-3">
      <label>Address</label>
      <input type="text" required name="address" value="{{old('address') ?? (@$manufacturer->address ?? '')}}" 
      class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address">
      @error('address')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Pincode -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label>Pincode</label>
      <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="6" minlength="6" 
      name="pincode" value="{{old('pincode') ?? (@$manufacturer->pincode ?? '')}}" class="form-control @error('pincode') is-invalid @enderror" 
      placeholder="Enter Pincode">
      @error('pincode')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- GST -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label>GST</label>
      <input type="text" required name="gst" value="{{old('gst') ?? (@$manufacturer->gst ?? '')}}" 
      class="form-control @error('gst') is-invalid @enderror" placeholder="Enter GST">
      @error('gst')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Store Contact -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label>Store Contact</label>
      <input type="text" required name="store_contact" value="{{old('store_contact') ?? (@$manufacturer->store_contact ?? '')}}" 
      class="form-control @error('store_contact') is-invalid @enderror" placeholder="Enter Store Contact">
      @error('store_contact')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Password -->
    <div class="form-group col-md-3 col-12 mb-3">
      <label>Password {{@$manufacturer->name ? '(Enter To Reset)' : ''}}</label>
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
      @error('password')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
</div>

<div class="card-footer d-flex justify-content-center">
  <button type="submit" class="btn btn-info">Save</button>
  <a href="{{ route('admin.manufacturer.index') }}" class="btn btn-secondary ms-3">Cancel</a>
</div>