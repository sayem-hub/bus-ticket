<?php

namespace App\Livewire;

use App\Models\Location;
use Livewire\Component;

class LocationManager extends Component
{

    public $location_name, $location, $mode, $selectedLocationId;
    public function render()
    {
        $allLocation = Location::all();
        return view('livewire.location-manager', compact('allLocation'))->layout('layouts.app');
    }


    protected $rules = [
        'location.location_name' => 'required',
    ];


    public function create()
    {

        $this->mode = 'create';
        $this->resetLocation();
    }


    public function edit($id)
    {
        $this->mode = 'edit';
    $locationData = Location::findOrFail($id);
    $this->location = [
        'selectedLocationId' => $locationData->id,
        'location_name' => $locationData->location_name,

    ];
    }


    public function save()
    {
        $this->validate();

       

        if ($this->mode === 'create') {
            // dd($this->location);
            Location::create($this->location);
        } elseif ($this->mode === 'edit') {
            //update location data
            Location::find($this->location['selectedLocationId'])->update($this->location);
        }

        $this->resetLocation();
    }


    public function cancel()
    {
        $this->mode = null;
        $this->resetLocation();
    }

    public function resetLocation()
    {
        $this->location = [
            'location_name' => '',
           
        ];
    }

}
