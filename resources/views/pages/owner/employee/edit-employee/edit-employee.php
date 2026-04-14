<?php

namespace App\Livewire\Owner\Employees;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.owner')] class extends Component
{
    public User $user; 

    public $name;
    public $email;

    public function mount(User $user)
    {
        // Policy Check: Owner can only manage Employees
        Gate::authorize('manage', $user);

        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3',
            // Unique check ignores current user ID
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