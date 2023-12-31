<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginComponent extends Component
{

    public $phone, $password;
    public function render()
    {
        return view('livewire.user.login-component')->layout('layouts.app');
    }


    public function login()
    {
        $credentials = $this->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);


       
        if (Auth::attempt(['phone' => $credentials['phone'], 'password' => $credentials['phone']])) {
            return redirect()->route('profile.page')->with('success', 'Login successful.'); 
        }

        return redirect()->back()->with('error', 'Invalid credentials.');
    }
}
