<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Computed; 
use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Role; 

new #[Layout('layouts::admin')] class extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $selectedRole; 

    #[Computed]
    public function roles()
    {
        return Role::all(); 
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'selectedRole' => 'required|string|exists:roles,name' 
        ];
    }

    public function save()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Assign only one role
        $user->assignRole($this->selectedRole);

        $this->reset(['name', 'email', 'password', 'password_confirmation', 'selectedRole']);

        session()->flash('success', 'User created successfully with role assigned!');
    }
};