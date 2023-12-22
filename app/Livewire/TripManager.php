<?php

namespace App\Livewire;

use App\Models\Trip;
use Livewire\Component;
use App\Models\Location;

class TripManager extends Component
{

    public $bus_number, $trip_date, $departure_location, $arrival_location, $trip_type, $trip_fare, $departure_date_time, $arrival_date_time, $trip_status, $trip, $mode;
    public function render()
    {
        $trips = Trip::all();
        $locations = Location::all();
        return view('livewire.trip-manager', compact('trips', 'locations'));
    }


    protected $rules = [
        'trip.bus_number' => 'required',
        'trip.trip_date' => 'required',
        'trip.departure_location' => 'required',
        'trip.arrival_location' => 'required',
        'trip.trip_type' => 'nullable',
        'trip.trip_fare' => 'required',
        'trip.departure_date_time' => 'required',
        'trip.arrival_date_time' => 'required',
        'trip.trip_status' => 'required',
    ];


    public function create()
    {

        $this->mode = 'create';
        $this->resetTrip();
    }


    public function edit($id)
    {
        $this->mode = 'edit';
        $this->trip = Trip::findOrFail($id);
    }

    public function save()
    {
        $this->validate();

        $user = auth()->user(); // Get the currently logged-in user

        if ($this->mode === 'create') {

            Trip::create($this->trip);
        } elseif ($this->mode === 'edit') {
            $this->trip->update();
        }

        $this->resetTrip();
    }


    public function cancel()
    {
        $this->mode = null;
        $this->resetTrip();
    }


    public function resetTrip()
    {
        $this->trip = [
            'bus_number' => '',
            'trip_date' => '',
            'departure_location' => '',
            'arrival_location' => '',
            'trip_type' => '',
            'trip_fare' => '',
            'departure_date_time' => '',
            'arrival_date_time' => '',
            'trip_status' => '',
        ];
    }
}
