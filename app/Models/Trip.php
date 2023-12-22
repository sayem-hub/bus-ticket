<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function departureLocation() {
        return $this->belongsTo(Location::class, 'departure_location' );
    }
    public function arrivalLocation() {
        return $this->belongsTo(Location::class, 'arrival_location' );
    }
}
