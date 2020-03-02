<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    public function location(){

    	return $this->belongsTo(Location::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'rents')->withPivot('plocation','dlocation','pick_up_date','drop_off_date','days','sum')->withTimestamps();
    }

    public function pickUpLocation()
    {
        return $this->belongsToMany(Location::class,'rents','car_id','plocation');
    }

    public function dropOffLocation()
    {
        return $this->belongsToMany(Location::class,'rents','car_id','dlocation');
    }

    

    
}
