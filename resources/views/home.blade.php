@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Search for available car / Pick up Date and Return Date</div>

                <div class="card-body">
                    <form method="POST" action="{{route('cars.search')}}">
                        @csrf
                    
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

                    <button class="btn-success btn btn-sm" type="submit">Search</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Rental Car Search</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                    @foreach($cars as $car)
                    <div class="col-sm-6 my-2">
                    <div class="card" style="width: 100%;">
                      @if($car->image)
                       <img src="{{asset('storage/'.$car->image)}}" alt="Car Image" class="card-img-top">
                      @endif
                      
                      <div class="card-body">
                        <h5 class="card-title">{{ $car->brand }} {{ $car->model }}</h5>
                        <p class="card-text"> 
                            @if($car->available == 1)
                             <a href="{{ route('rent.step1', $car->id)}}" class="btn btn-success">Rent</a></td>
                            @else
                            Reserved
                            @endif
                        </p>
                        @if($car->available == 0)
                        <ul class="list-group">
                           @foreach($car->users as $r)
                           <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pick Up date
                           <span class="badge badge-primary badge-pill">{{ $r->pivot->pick_up_date }}</span>
                           </li>

                           <li class="list-group-item d-flex justify-content-between align-items-center">
                            Drop Off date
                           <span class="badge badge-primary badge-pill">{{ $r->pivot->drop_off_date }}</span>
                           </li>
                           @endforeach

                           @foreach($car->pickUpLocation as $c)
                           <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pick up Location
                           <span class="badge badge-primary badge-pill">{{ $c->name }}</span>
                           </li>
                           @endforeach

                           @foreach($car->dropOffLocation as $d)
                           <li class="list-group-item d-flex justify-content-between align-items-center">
                            Drop Off Location
                           <span class="badge badge-primary badge-pill">{{ $d->name }}</span>
                           </li>
                           @endforeach
                           


                         </ul>
                            
                            
                        @endif

                        <br />
                        <a href="{{ route('car.show', $car->id) }}" class="btn btn-primary btn-sm">Show details</a>
                        @foreach($car->users as $user)
                          @if($user->id == auth()->user()->id)
                            <a href="{{ route('rent.cancel', $car->id) }}" class="btn btn-danger btn-sm">Cancel rent</a>
                          @endif
                        @endforeach
                      </div>
                    </div>
                    </div>
                    @endforeach

                    
                </div>
                </div>
                {{ $cars->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
