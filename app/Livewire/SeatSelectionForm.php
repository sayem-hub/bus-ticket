<?php

namespace App\Livewire;

use App\Models\Trip;
use Livewire\Component;
use Livewire\Attributes\On;

class SeatSelectionForm extends Component
{

  

    public $showSeatSelectionForm = false;

    #[On('setTrip')]
    public function render($trip)
    {

        return route('seat.selection    ', ['seats' => $this->selectedSeats]);
        // Fetch available seats based on the selected trip or any other criteria
        // $availableSeats = []; // Replace with your logic to get available seats

        // return view('livewire.seat-selection-form', ['availableSeats' => $availableSeats, 'trip' => $trip]);
    }

   
   
   
    public function selectSeatsHere($tripId = null)
    {

        
        $seats = Trip::where('trip_id', $tripId)->get();

     // Render the seat selection form with the fetched seats
     return view('livewire.seat-selection-form', ['seats' => $seats]);
    }



    public function confirmBooking()
    {
        // Redirect to the confirmation form with selected seats
        return redirect()->route('booking.confirmation', ['seats' => $this->selectedSeats]);
    }
}