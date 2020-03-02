@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>Congratulation. You reserved a car.</h2><h3>Reservation Details</h3></div>

                <div class="card-body">
                   
                <table class="table">
                   <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Brand</th>
                      <th scope="col">Model</th>
                      <th scope="col">Pick Up Date</th>
                      <th scope="col">Drop Off Date</th>
                      <th scope="col">Days</th>
                      <th scope="col">Cost</th>
                      <th scope="col">Location</th>
                     
                    </tr>
                   </thead>
                   <tbody>
                    <tr>
                      <th scope="row">{{ $car->id }}</th>
                      <td>{{ $car->brand }}</td>
                      <td>{{ $car->model }}</td>
                      <td>{{ $car->pivot->pick_up_date }}</td>
                      <td>{{ $car->pivot->drop_off_date }}</td>
                      <td>{{ $car->pivot->days }}</td>
                      <td>{{ $car->pivot->sum }}</td>
                      <td><a href="{{route('location.show', $car->location->id )}}">{{ $car->location->name }}</a></td>
                      

            
                    </tr>
    
                   </tbody>
                  </table>

                   <form method="POST" action="{{route('rent.store')}}">
                        @csrf
                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <input type="hidden" name="pickupdate" value="{{ $pdate }}">
                    <input type="hidden" name="dropoffdate" value="{{ $ddate }}">
                    <input type="hidden" name="days" value="{{ $days }}">
                    <input type="hidden" name="sum" value="{{ $sum }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <button class="btn btn-success">Confirm</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
