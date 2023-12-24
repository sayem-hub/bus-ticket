<?php

use App\Livewire\HomePage;
use App\Livewire\TripManager;
use App\Livewire\LocationManager;
use App\Livewire\SeatSelectionForm;
use Illuminate\Support\Facades\Route;
use App\Livewire\BookingConfirmationForm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', HomePage::class)->name('home.page');
Route::get('/location', LocationManager::class)->name('location.page');
Route::get('/trips', TripManager::class)->name('trip.page');

Route::get('/seat-selection/{tripId}', SeatSelectionForm::class)->name('seat.selection');
Route::get('/booking-confirmation/{seats}', BookingConfirmationForm::class)->name('booking.confirmation');