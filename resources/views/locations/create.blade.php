@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Location</div>

                <div class="card-body">
                   <form action="{{ route('location.store')}}" method="POST">
                     @csrf
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"  value="{{old('email')}}">
                       @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="ex. ABC Rent a car Skopje" value="{{old('name')}}">

                       @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address"  value="{{old('address')}}">

                       @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="latitude">Latitude</label>
                      <input type="number" step="0.00000001" name="latitude" class="form-control @error('latitude') is-invalid @enderror" id="latitude"  value="{{old('latitude')}}">

                       @error('latitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="longitude">Longitude</label>
                      <input type="number" step="0.00000001" name="longitude" class="form-control @error('longitude') is-invalid @enderror" id="longitude"  value="{{old('longitude')}}">

                       @error('longitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                            <label for="phone_number">Phone Number</label>

                                <input type="tel" id="phone_number" name="phone_number"  class="form-control @error('phone_number') is-invalid @enderror">
                                <small class="text-muted">Format: 123-456-789</small>
                                

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
