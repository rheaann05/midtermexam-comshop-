<?php

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::admin')] class extends Component
{
   #[Computed()]
    public function users()
    {
        // Fetch all users with their roles
        return User::with('roles')->select('id','name','email','created_at')->get();
    }

};