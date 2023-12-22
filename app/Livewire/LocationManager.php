<?php

namespace App\Livewire;

use App\Models\Location;
use Livewire\Component;

class LocationManager extends Component
{

    public $location_name, $location, $mode;
    public function render()
    {
        $allLocation = Location::all();
        return view('livewire.location-manager', compact('allLocation'));
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
        $this->location = Location::findOrFail($id);
    }


    public function save()
    {
        $this->validate();

       

        if ($this->mode === 'create') {
            // dd($this->location);
            Location::create($this->location);
        } elseif ($this->mode === 'edit') {
            $this->location->update($this->location);
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
