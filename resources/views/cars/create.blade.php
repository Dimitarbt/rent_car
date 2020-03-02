@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Car</div>

                <div class="card-body">
                   <form action="{{ route('car.store')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                    <div class="form-group">
                      <label for="brand">Brand</label>
                      <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" id="brand" placeholder="ex. Toyota" value="{{old('brand')}}">
                       @error('brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="model">Model</label>
                      <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" id="model" placeholder="ex. Yaris" value="{{old('model')}}">

                       @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="year">Year</label>
                      <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" id="year" placeholder="ex. 2010" value="{{old('year')}}">

                       @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="type_of_fuel">Type of fuel</label>
                      <input type="text" name="type_of_fuel" class="form-control @error('type_of_fuel') is-invalid @enderror" id="type_of_fuel" placeholder="ex. Diesel" value="{{old('type_of_fuel')}}">

                       @error('type_of_fuel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="price_per_day">Price per Day</label>
                      <input type="number" step="0.01" name="price_per_day" class="form-control @error('price_per_day') is-invalid @enderror" id="price_per_day" placeholder="ex. 39.99" value="{{old('price_per_day')}}">

                       @error('price_per_day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>



                    <div class="form-grop d-flex flex-column py-3">
                     <label for="image">Profile Image</label>
                     <input type="file" name="image" class="@error('image') is-invalid @enderror" />

                     @error('image')
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
</div>
@endsection
