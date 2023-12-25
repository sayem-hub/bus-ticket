<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;

class RegisterComponent extends Component
{
    public $name, $phone, $password, $passwordConfirmation;

    public function register()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'password' => bcrypt($validatedData['password']), // Hash the password
        ]);

        session()->flash('success', 'Registration successful!');

        // Redirect to login or intended page
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.user.register-component')->layout('layouts.app');
    }
}
