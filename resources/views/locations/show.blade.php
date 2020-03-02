@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Details of {{ $location->name }}</div>

                <div class="card-body">
                   
                <table class="table">
                   <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Email</th>
                      <th scope="col">Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Latitude</th>
                      <th scope="col">Longitude</th>
                      <th scope="col">Phone Number</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

                    </tr>
                   </thead>
                   <tbody>
                    <tr>
                      <th scope="row">{{ $location->id }}</th>
                      <td>{{ $location->email }}</td>
                      <td>{{ $location->name }}</td>
                      <td>{{ $location->address }}</td>
                      <td>{{ $location->latitude }}</td>
                      <td>{{ $location->longitude }}</td>
                      <td>{{ $location->phone_number }}</td>
                      <td><a href="" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil" style="color:blue"></i></a></td>
                      <td>
                        <form method="POST" action="{{route('location.destroy', $location->id)}}">
                          @csrf
                          @method('DELETE')
                          <button type="submit"><i class="fa fa-trash" style="color:red"></i></button>
                        </form>
                      </td>

            
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
        <h5 class="modal-title" id="exampleModalLabel">Edit location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('location.update', $location->id)}}" method="POST">
      <div class="modal-body">
                     @csrf
                     @method('PUT')
                    <div class="form-group">
                      <label for="brand">Brand</label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $location->email }}">
                       @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $location->name }}">

                       @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address"value="{{ $location->address }}">

                       @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="latitude">Latitude</label>
                      <input type="number" step="0.00000001" name="latitude" class="form-control @error('latitude') is-invalid @enderror" id="latitude"  value="{{ $location->latitude }}">

                       @error('latitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="longitude">Longitude</label>
                      <input type="number" step="0.00000001" name="longitude" class="form-control @error('longitude') is-invalid @enderror" id="longitude"  value="{{ $location->longitude }}">

                       @error('longitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>

                    <div class="form-group">
                            <label for="phone_number">Phone Number</label>

                                <input type="tel" id="phone_number" name="phone_number"  class="form-control @error('phone_number') is-invalid @enderror" value="{{ $location->phone_number }}">
                                <small class="text-muted">Format: 123-456-789</small>
                                

                                @error('phone_number')
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
