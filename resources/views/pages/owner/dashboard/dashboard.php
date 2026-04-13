<?php

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\User; // Import your User model to count employees

new #[Layout('layouts.owner')] class extends Component 
{
    // Initialize the array so the Blade doesn't throw "Undefined array key"
    public $stats = [
        'total_employees' => 0
    ];

    public function mount()
    {
        // Use Spatie's role() scope to count users with the 'employee' role
        $this->stats['total_employees'] = User::role('employee')->count();
    }
};