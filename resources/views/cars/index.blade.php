@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Cars</div>

                <div class="card-body">
                  <p><a href="{{ route('car.create') }}" class="btn btn-success">Create a car</a></p>
                <table class="table">
                   <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Brand</th>
                      <th scope="col">Model</th>
                      <th scope="col">Year</th>
                      <th scope="col"></th>

                    </tr>
                   </thead>
                   <tbody>
                    @foreach($cars as $car)
                    <tr>
                      
                      <th scope="row">{{ $car->id }}</th>
                      <td>{{ $car->brand }}</td>
                      <td>{{ $car->model }}</td>
                      <td>{{ $car->year }}</td>
                      <th><a href="{{route('car.show', $car->id)}}">Show more</a></th>

                    </tr>
                    @endforeach
    
                   </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
