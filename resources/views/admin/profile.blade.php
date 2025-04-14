@extends('layouts.admin')

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">

      <div class="card card-info mx-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          Edit Profile
        </div>
        <form action="{{ route('admin.profile') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <!-- Name -->
              <div class="form-group col-md-3 col-12 mb-3">
                <label>Name</label>
                <input type="text"  name="name" value="{{old('name') ?? (@$user->name ?? '')}}" 
                class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <!-- Email -->
              <div class="form-group col-md-3 col-12 mb-3">
                <label>Email</label>
                <input type="email"  name="email" value="{{old('email') ?? (@$user->email ?? '')}}" 
                class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <!-- Password -->
              <div class="form-group col-md-3 col-12 mb-3">
                <label>Password (Enter To Reset)</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="card-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-info">Update</button>
          </div>
        </form>
      </div>



      

        
    </div>
  </div>
@endsection
