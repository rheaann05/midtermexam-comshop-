<?php

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.owner')] class extends Component 
{
    // Task 3: Logic to view ONLY employees
    #[Computed]
    public function employees()
    {
        return User::role('employee')->latest()->get();
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        
        // Final security check: Ensure we aren't deleting an admin
        if ($user->hasRole('employee')) {
            $user->delete();
            session()->flash('success', 'Employee deleted successfully.');
        }
    }
};