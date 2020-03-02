@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pick Date and Locations</div>

                <div class="card-body">
                    @if (session('wrong-date'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('wrong-date') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{route('rent.step2')}}">
                        @csrf
                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <div class="form-group">
                            <label for="pickupdate">Pick up Date</label>

                            <div class="col-md-6">
                                <input class="form-control @error('pickupdate') is-invalid @enderror" type="date" id="pickupdate" name="pickupdate" value="{{ old('pickupdate')}}">

                                @error('pickupdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>

                    <div class="form-group">
                            <label for="dropoffdate">Drop off date</label>

                            <div class="col-md-6">
                                <input class="form-control @error('dropoffdate') is-invalid @enderror" type="date" id="dropoffdate" name="dropoffdate" value="{{ old('dropoffdate')}}">

                                @error('dropoffdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>

                    <div class="form-group">
                            <label for="plocation">Pick up Location</label>

                            <div class="col-md-6">
                                <select name="plocation" class="form-control @error('plocation') is-invalid @enderror">
                                  @foreach($locations as $location)
                                    <option value="{{$location->id}}">{{$location->name}}</option>
                                  @endforeach
                                </select>

                                @error('plocation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>

                    <div class="form-group">
                            <label for="dlocation">Drop off Location</label>

                            <div class="col-md-6">
                                <select name="dlocation" class="form-control @error('dlocation') is-invalid @enderror">
                                  @foreach($locations as $location)
                                    <option value="{{$location->id}}">{{$location->name}}</option>
                                  @endforeach
                                </select>

                                @error('dlocation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                    <button class="btn btn-success">Rent</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Rent {{ $car->brand }} {{ $car->model }}</div>

                <div class="card-body">
                   
                <table class="table">
                   <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Brand</th>
                      <th scope="col">Model</th>
                      <th scope="col">Year</th>
                      <th scope="col">Type of Fuel</th>
                      <th scope="col">Price per Day</th>
    
                     
                    </tr>
                   </thead>
                   <tbody>
                    <tr>
                      <th scope="row">{{ $car->id }}</th>
                      <td>{{ $car->brand }}</td>
                      <td>{{ $car->model }}</td>
                      <td>{{ $car->year }}</td>
                      <td>{{ $car->type_of_fuel }}</td>
                      <td>{{ $car->price_per_day }}</td>
                      
                      

            
                    </tr>
    
                   </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
