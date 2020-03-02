@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Details of {{ $car->brand }} {{ $car->model }}</div>

                <div class="card-body">
                  @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                @if($car->image)
                  <img src="{{asset('storage/'.$car->image)}}" alt="Car Image" class="img-fluid">
                @endif
                   
                <table class="table">
                   <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Brand</th>
                      <th scope="col">Model</th>
                      <th scope="col">Year</th>
                      <th scope="col">Type of Fuel</th>
                      <th scope="col">Price per Day</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                      <th scope="col">Rent</th>

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
                      
                      <td><a href="" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil" style="color:blue"></i></a></td>
                      <td>
                        <form method="POST" action="{{route('car.destroy', $car->id)}}">
                          @csrf
                          @method('DELETE')
                          <button type="submit"><i class="fa fa-trash" style="color:red"></i></button>
                        </form>
                      </td>
                      @if($car->available == 1)
                      <td><a href="{{ route('rent.step1', $car->id)}}" class="btn btn-primary">Continue</a></td>
                      @else
                      <td>Reserved</td>
                      @endif
                      
                      

            
                    </tr>
    
                   </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit car</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('car.update', $car->id)}}" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
                     @csrf
                     @method('PUT')
                    <div class="form-group">
                      <label for="brand">Brand</label>
                      <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" id="brand" placeholder="ex. Toyota" value="{{ $car->brand }}">
                       @error('brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="model">Model</label>
                      <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" id="model" placeholder="ex. Yaris" value="{{ $car->model }}">

                       @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="year">Year</label>
                      <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" id="year" placeholder="ex. 2010" value="{{ $car->year }}">

                       @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="type_of_fuel">Type of fuel</label>
                      <input type="text" name="type_of_fuel" class="form-control @error('type_of_fuel') is-invalid @enderror" id="type_of_fuel" placeholder="ex. Diesel" value="{{ $car->type_of_fuel }}">

                       @error('type_of_fuel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="price_per_day">Price per Day</label>
                      <input type="number" step="0.01" name="price_per_day" class="form-control @error('price_per_day') is-invalid @enderror" id="price_per_day" placeholder="ex. 39,99" value="{{ $car->price_per_day }}">

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

                   
                    
                  
                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Edit</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
