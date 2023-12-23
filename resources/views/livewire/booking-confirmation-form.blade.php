<!-- resources/views/livewire/booking-confirmation-form.blade.php -->

<div>
    <h2>Booking Confirmation</h2>
    <!-- Display booking details -->
    <form wire:submit.prevent="confirmBooking">
        <!-- Display booking details -->
        <div>
            @foreach ($bookingDetails as $key => $value)
                <label>{{ $key }}: {{ $value }}</label>
            @endforeach
        </div>

        <!-- Add input fields for personal details -->
        <!-- Example: -->
        <div>
            <label>Name:</label>
            <input type="text" wire:model="name">
        </div>

        <div>
            <label>Email:</label>
            <input type="email" wire:model="email">
        </div>

        <div>
            <label>Phone:</label>
            <input type="tel" wire:model="phone">
        </div>

        <div>
            <button type="submit">Confirm Booking</button>
        </div>
    </form>
</div>
