<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Rules\CustomPhoneRegexRule;
class LocationController extends Controller
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
        $locations = Location::paginate(20);

        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validationRules();

        Location::create($data);

         return redirect()->route('location.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
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
    public function update(Request $request, Location $location)
    {
        $data = $this->validationRules();

        $location->update($data);

        return redirect()->route('location.show', $location);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('location.index');
    }


    public function validationRules(){
        return request()->validate([

            'email' =>  'required|string|email|max:255',
            'name'  =>  'required|string|max:50',
            'address'   =>  'required|string|max:50',
            'latitude'  =>  'required|numeric',
            'longitude' =>  'required|numeric',
            'phone_number'  =>  ['nullable',new CustomPhoneRegexRule()],
        ]);
    }
}
