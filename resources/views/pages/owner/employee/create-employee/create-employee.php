<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

new #[Layout('layouts.owner')] class extends Component
{
    // Use Livewire 3's Validate attribute
    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|email|unique:users')]
    public $email = '';

    #[Validate('required|min:6')]
    public $password = '';

    public function save()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->assignRole('employee');

        session()->flash('success', 'Employee created successfully.');
        
        return redirect()->route('owner.employees.view');
    }
};