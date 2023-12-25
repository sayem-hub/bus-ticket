<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Models\Location;

class ProfileManager extends Component
{

    public $phone, $locations, $getUserData;
    public function render()
    {
        $this->locations = Location::all();
        return view('livewire.profile-manager')->layout('layouts.app');
    }

    public function searchByPhone()
    {
        // $getUserData = User::where('phone', $this->phone)
        //     ->join('seat_allocations', 'users.id', '=', 'seat_allocations.user_id')
        //     ->join('locations', 'seat_allocations.boarding_point', '=', 'locations.id')
        //     ->join('trips as from_trips', 'from_trips.departure_location', '=', 'locations.id')
        //     ->join('trips as to_trips', 'to_trips.arrival_location', '=', 'locations.id')
        //     ->select('users.*', 'from_trips.departure_location as from_location', 'to_trips.arrival_location as to_location',  'locations.location_name as boarding_point_name', 'seat_allocations.trip_date as trip_date', 'seat_allocations.seat_number as seat_number', 'seat_allocations.total_fare as total_fare')        
        //     ->get();

        //     // dd($getUserData);
        // $this->getUserData = $getUserData;


        $getUserData = User::where('phone', $this->phone)
            ->join('seat_allocations', 'users.id', '=', 'seat_allocations.user_id')
            ->join('trips', 'seat_allocations.trip_id', '=', 'trips.id')
            ->join('locations as boarding_point', 'seat_allocations.boarding_point', '=', 'boarding_point.id')
            ->join('locations as from_location', 'trips.departure_location', '=', 'from_location.id')
            ->join('locations as to_location', 'trips.arrival_location', '=', 'to_location.id')
            ->select(
                'users.*',
                'boarding_point.location_name as boarding_point_name',
                'from_location.location_name as from_location_name',
                'to_location.location_name as to_location_name', 'seat_allocations.trip_date as trip_date', 
                'seat_allocations.seat_number as seat_number', 'seat_allocations.total_fare as total_fare'
            )
            ->get();

        $this->getUserData = $getUserData;
        
       
    }

}
