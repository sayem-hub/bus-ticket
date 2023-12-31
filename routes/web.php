<?php

use App\Livewire\HomePage;
use App\Livewire\TripManager;
use App\Livewire\LocationManager;
use App\Livewire\SeatSelectionForm;
use App\Livewire\User\LoginComponent;
use App\Livewire\User\ProfileManager;
use Illuminate\Support\Facades\Route;
use App\Livewire\User\RegisterComponent;

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
Route::get('/locations', LocationManager::class)->name('location.page');
Route::get('/trips', TripManager::class)->name('trip.page');

Route::get('/seat-selection/{tripId}', SeatSelectionForm::class)->name('seat.selection');

Route::get('/profile', ProfileManager::class)->name('profile.page');
Route::get('/register', RegisterComponent::class)->name('register.page');
Route::get('/login', LoginComponent::class)->name('login.page');