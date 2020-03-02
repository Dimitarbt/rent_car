@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Available Cars for dates between {{ $pick_up_date }} - {{$drop_off_date}}</div>

                <div class="card-body">
                <div class="row">
                    @foreach($cars as $car)
                    <div class="col-sm-6 my-2">
                    <div class="card" style="width: 100%;">
                      @if($car->image)
                       <img src="{{asset('storage/'.$car->image)}}" alt="Car Image" class="card-img-top">
                      @endif
                      
                      <div class="card-body">
                        <h5 class="card-title">{{ $car->brand }} {{ $car->model }}</h5>
                        <ul class="list-group">
                           
                           <li class="list-group-item d-flex justify-content-between align-items-center">
                            Year
                           <span class="badge badge-primary badge-pill">{{ $car->year }}</span>
                           </li>

                           <li class="list-group-item d-flex justify-content-between align-items-center">
                            Type of Fuel
                           <span class="badge badge-primary badge-pill">{{ $car->type_of_fuel }}</span>
                           </li>

                           <li class="list-group-item d-flex justify-content-between align-items-center">
                            Price per Day
                           <span class="badge badge-primary badge-pill">{{ $car->price_per_day }}</span>
                           </li>

                        </ul>
                        <p class="card-text">   
                          <a href="{{ route('rent.step1', $car->id)}}" class="btn btn-success btn-sm mt-5">Rent</a></td>        
                        </p>
                        
                        
                      </div>
                    </div>
                    </div>
                    @endforeach

                    
                </div>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
