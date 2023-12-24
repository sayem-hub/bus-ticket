<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Location;

class ProfileManager extends Component
{

    public $phone, $locations, $getUserData;
    public function render()
    {
        $this->locations = Location::all();
        return view('livewire.profile-manager')->layout('layouts.app');
    }

    public function searchByPhone()
    {
        $getUserData = User::with( 'seats')->where('phone', $this->phone)->get();
        //    dd($getUserData);
        $this->getUserData = $getUserData;
       
    }

}
