@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Locations</div>

                <div class="card-body">
                  <p><a href="{{ route('location.create') }}" class="btn btn-success">Create a location</a></p>
                <table class="table table-striped">
                  
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Email</th>
                      <th scope="col">Name</th>
                      <th scope="col">Address</th>
                      <th scope="col"></th>

                    </tr>
                  @foreach($locations as $location)
                    <tr>
                      
                      <th scope="row">{{ $location->id }}</th>
                      <td>{{ $location->email }}</td>
                      <td>{{ $location->name }}</td>
                      <td>{{ $location->address }}</td>
                      <th><a href="{{route('location.show', $location->id)}}">Show more</a></th>

                      
            
                    </tr>
                  @endforeach
                   
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
