<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate; // <--- Added Gate import
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::admin')] class extends Component
{
    #[Computed()]
    public function users()
    {
        // Fetch all users with their roles. 
        return User::with('roles')
            ->select('users.id', 'users.name', 'users.email', 'users.created_at')
            ->get();
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        
        // 1. Policy Check: Ensure the current user is authorized to manage (delete) this target user
        Gate::authorize('manage', $user);
        
        // 2. Prevent self-deletion
        if ($user->id === Auth::id()) {
            session()->flash('error', 'You cannot delete yourself.');
            return;
        }

        $user->delete();
        
        // Clear the computed property cache so the table refreshes
        unset($this->users);
        
        // Optional: Add a success message for good UX!
        session()->flash('success', 'User deleted successfully.');
    }
};