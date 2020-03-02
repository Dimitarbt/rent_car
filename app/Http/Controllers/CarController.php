<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Location;
class CarController extends Controller
{   

     public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate(20);

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $locations = Location::all();
        return view('cars.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validationRequests();

        $car = Car::create($data);
        $this->storeImage($car);

        return redirect()->route('car.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {   
        $locations = Location::all();
        return view('cars.show', compact('car','locations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $data = $this->validationRequests();

        $car->update($data);

        $this->storeImage($car);

        return redirect()->route('car.show', $car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {   

        $car->delete();
        return redirect()->route('car.index');

    }

    public function storeImage($car){
     
        if(request()->has('image')){
          $car->update([
            'image' => request()->image->store('uploads','public'),
          ]);
          
        }
    }


    public function validationRequests(){

        return request()->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'year'  => 'required|integer',
            'type_of_fuel'  => 'required|string',
            'price_per_day'  => 'required|numeric',
            'image' => 'sometimes|file|image|max:5000',
        ]);
    }


    public function search(Request $request){

        request()->validate([
            'pickupdate' => 'required|date',
            'dropoffdate' => 'required|date',
        ]);
       
        $pick_up_date = $request->pickupdate;
        $drop_off_date = $request->dropoffdate;
       
          
        $cars = Car::whereDoesntHave('users', function ($q) use ($pick_up_date, $drop_off_date) {
            $q->whereBetween('pick_up_date', [$pick_up_date,$drop_off_date] )->orWhereBetween('drop_off_date', [$pick_up_date,$drop_off_date])->orWhere(function($q) use($pick_up_date, $drop_off_date) {
                  $q->where('pick_up_date', '<', $pick_up_date)->where('drop_off_date', '>', $drop_off_date);
                  });  
        })->get(); 
        

        return view('cars.search',compact('cars', 'pick_up_date', 'drop_off_date'));
        
    }

    
}
