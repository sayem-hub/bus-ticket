<div>
    <h2>Select Your Seats</h2>
    <form wire:submit.prevent="confirmBooking">
        <div>
            <!-- Display available seats -->
            @foreach ($availableSeats as $seatNumber)
                <label>
                    <input type="checkbox" wire:model="selectedSeats" value="{{ $seatNumber }}">
                    {{ $seatNumber }}
                </label>
            @endforeach
        </div>

        <div>
            <button type="submit">Proceed to Confirmation</button>
        </div>
    </form>
</div>