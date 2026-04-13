<?php

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.owner')] class extends Component
{
    public User $user;
    public $name;
    public $email;

    public function mount(User $user)
    {
        // RBAC Check: Ensure the owner isn't trying to edit an admin
        if (!$user->hasRole('employee')) {
            return redirect()->route('owner.employees.view');
        }

        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
        ];
    }

    public function update()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Employee updated successfully.');

        return redirect()->route('owner.employees.view');
    }
};