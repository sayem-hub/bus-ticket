<?php

namespace App\Livewire;

use App\Models\Trip;
use Livewire\Component;
use App\Models\Location;
use Illuminate\Support\Facades\Log;

class HomePage extends Component
{

    public $trip = [
        'departure_location' => '',
        'arrival_location' => '',
        'trip_date' => '',
    ];
    public $locations;
    public $bookTrip;
    public $searchResults;

    public $selectedTripId;
    public function render()
    {
        $this->locations = Location::all();
        return view('livewire.home-page')->layout('layouts.app');
    }

    public function search()
    {

        try {
            $this->searchResults = Trip::with('departureLocation', 'arrivalLocation')
                ->where('departure_location', $this->trip['departure_location'])
                ->where('arrival_location', $this->trip['arrival_location'])
                ->where('trip_date', $this->trip['trip_date'])
                ->get();


        } catch (\Exception $e) {

            Log::error('Error in search method: ' . $e->getMessage());
        }
    }


    public function bookNow($tripId)
    {
        $requestTrips = Trip::find($tripId);
        $this->dispatch('setTrip', trip: $requestTrips);
    }

}
