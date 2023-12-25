<?php

namespace App\Livewire;

use App\Models\Trip;
use App\Models\User;
use Livewire\Component;
use App\Models\Location;
use App\Models\SeatAllocation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SeatSelectionForm extends Component
{

    public $tripId, $trip_date, $seat_number, $name, $phone, $email, $address, $locations, $boarding_point, $bus_number, $departure_location, $arrival_location, $available_seats, $departure_date_time, $arrival_date_time, $trip_fare, $total_fare;
    public function render()
    {
        $this->locations = Location::select('id', 'location_name')->get();
      
        return view('livewire.seat-selection-form')->layout('layouts.app');
    }

    public function mount($tripId)
    {
        $this->tripId = $tripId;
        $tripsSelection = Trip::findOrFail($this->tripId);

        $this->bus_number = $tripsSelection->bus_number;
        $this->trip_date = $tripsSelection->trip_date;
        $this->departure_location = $tripsSelection->departure_location;
        $this->arrival_location = $tripsSelection->arrival_location;
        $this->available_seats = $tripsSelection->available_seats;
        $this->departure_date_time = $tripsSelection->departure_date_time;
        $this->arrival_date_time = $tripsSelection->arrival_date_time;
        $this->trip_fare = $tripsSelection->trip_fare;


    }



    public function confirmBooking()
    {
        $validateData = $this->validate([
            'trip_date' => 'required',
            'seat_number' => 'required',
            'boarding_point' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'address' => 'required',
        ]);

        // dd($validateData);
        DB::beginTransaction();
        
        try {

            if ($this->available_seats < $validateData['seat_number']) {
                throw new \Exception('You have entered more seats than available!');
            }


            $existingUser = User::where('phone', $validateData['phone'])->first();

            if ($existingUser) {
                // User already exists, redirect to login
                return redirect()->route('login.page')->with('error', 'Please login to proceed with booking.');
            }

            $userData = User::create([
                'name' => $validateData['name'],
                'phone' => $validateData['phone'],
                'email' => $validateData['email'],
                'address' => $validateData['address'],
            ]);

            $booking = SeatAllocation::create([
                'user_id' => $userData->id,
                'trip_id' => $this->tripId,
                'seat_number' => $validateData['seat_number'],
                'boarding_point' => $validateData['boarding_point'],
                'trip_date' => $validateData['trip_date'],
                'total_fare' => $validateData['seat_number'] * $this->trip_fare,
            ]);


            

            $tripSelection = Trip::findOrFail($this->tripId);

            $tripSelection->update([
                'available_seats' => $tripSelection->available_seats - $validateData['seat_number'],
            ]);

            DB::commit();
            Session::flash('success', 'Booking confirmed successfully! Thank you!');

            $this->reset([
                'name',
                'phone',
                'email',
                'address',
                'seat_number',
                'boarding_point',
                'trip_date',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());

        }

        
    }
}