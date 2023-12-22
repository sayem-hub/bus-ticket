<?php

use App\Livewire\LocationManager;
use App\Livewire\TripManager;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('home.page');


Route::get('/location', LocationManager::class)->name('location.page');
Route::get('/trips', TripManager::class)->name('trip.page');