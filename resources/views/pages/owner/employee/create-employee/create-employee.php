<?php

namespace App\Livewire\Owner\Employees; // Good practice to include the namespace!

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

new #[Layout('layouts.owner')] class extends Component
{
    #[Validate('required|string|min:3')]
    public $name = '';

    #[Validate('required|email|unique:users,email')]
    public $email = '';

    // Added 'confirmed' to require a matching password_confirmation field
    #[Validate('required|min:6|confirmed')]
    public $password = '';

    public $password_confirmation = ''; // Required for the 'confirmed' rule

    public function save()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Perfectly executed: strictly assigning only the 'employee' role
        $user->assignRole('employee');

        session()->flash('success', 'Employee created successfully.');
        
        return redirect()->route('owner.employees.view');
    }
};