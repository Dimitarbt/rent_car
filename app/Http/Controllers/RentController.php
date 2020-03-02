<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Car;
use App\location;
class RentController extends Controller
{   

     public function __construct()
    {
        $this->middleware('auth');
    }


    public function step1($car_id){

    	$car = Car::findOrFail($car_id);
        
    	$user = auth()->user();

        $locations = Location::all();

    	return view('rent.step1', compact('car', 'user', 'locations'));

    }


    public function step2(Request $request){
    	//dd(request()->all());

        $request->validate([
            'pickupdate' => 'required',
            'dropoffdate' => 'required',
            'plocation' => 'required',
            'dlocation' => 'required',
        ]);

    	$pdate = request('pickupdate');
    	$ddate = request('dropoffdate');
    	$pickupdate = strtotime($pdate);
    	$dropoffdate = strtotime($ddate);

        $plocation = $request->plocation;
        $dlocation = $request->dlocation;

        $pl = Location::findOrFail($plocation);
        $dl = Location::findOrFail($dlocation);
        
    	$car_id = $request->car_id;

        $car = Car::findOrFail($car_id);

    	if($dropoffdate > $pickupdate){
    		

    	   $datediff = $dropoffdate - $pickupdate;

           $days = ceil($datediff / (60 * 60 * 24));

           $sum = $days * $car->price_per_day;

           return view('rent.step2', compact('pdate','ddate','days', 'sum','car','pl','dl'));
    	}

    	else{

    		session()->flash('wrong-date', 'Please select dates, again !!! Pick up Date must be smaller than Dropp off Date');
    		return redirect()->back();
    	}

    	
    }


    public function store(Request $request){
    	//dd($request->all());
    	$car_id = $request->car_id;
    	$pick_up_date = $request->pickupdate;
    	$drop_off_date = $request->dropoffdate;
        $plocation = $request->plocation;
        $dlocation = $request->dlocation;
    	$days = $request->days;
    	$sum = $request->sum;
    	$car = Car::findOrFail($car_id);
    	$car->available = 0;
    	$car->save();	

    	$car->users()->attach($request->user_id,['plocation' => $plocation, 'dlocation' => $dlocation,'pick_up_date' => $pick_up_date, 'drop_off_date' => $drop_off_date, 'days' => $days, 'sum' => $sum]);

    	//return view('rent.finish', compact('car'));

    	session()->flash('success','Successfully rent a car');
         
    	 return redirect()->route('car.show', $car_id);
    }


    public function cancelRent($car_id){

        $car = Car::findOrFail($car_id);
        $car->available = 1;
        $car->update();

        $car->users()->detach(auth()->user()->id);


        session()->flash('status','Successfully cancel rent!');

        return redirect()->back();
    }
}
