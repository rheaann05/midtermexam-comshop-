<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'], 
            ['name' => 'System Admin', 'password' => Hash::make('123123')]
        );
        $admin->assignRole('admin');

        // Create Owner
        $owner = User::firstOrCreate(
            ['email' => 'owner@example.com'], 
            ['name' => 'Shop Owner', 'password' => Hash::make('123123')]
        );
        $owner->assignRole('owner');

        // Create Employee
        $employee = User::firstOrCreate(
            ['email' => 'employee@example.com'], 
            ['name' => 'Employee User', 'password' => Hash::make('123123')]
        );
        $employee->assignRole('employee');
    }
}