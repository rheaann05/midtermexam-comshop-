<?php

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Role;

new #[Layout('layouts::admin')] class extends Component
{
    public User $user; // Typed property for better Livewire v3 compatibility
    public $name;
    public $email;
    public $selectedRoles = [];

    // 1. Added Computed property to supply the Blade view with all roles
    #[Computed]
    public function roles()
    {
        return Role::all();
    }

    public function mount(User $user)
    {
        // 2. Apply your UserPolicy!
        Gate::authorize('manage', $user);

        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->selectedRoles = $user->roles->pluck('name')->toArray();
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'selectedRoles' => 'array',
            // 3. Ensure every role checked actually exists in the database
            'selectedRoles.*' => 'exists:roles,name', 
        ];
    }

    public function save()
    {
        // Double-check the policy before saving (prevents forced POST requests)
        Gate::authorize('manage', $this->user);

        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->user->syncRoles($this->selectedRoles);

        session()->flash('success', 'User updated successfully!');
    }
};