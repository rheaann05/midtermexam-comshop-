<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create the Roles (Spatie)
        $adminRole = Role::create(['name' => 'admin']);
        $ownerRole = Role::create(['name' => 'owner']);
        $employeeRole = Role::create(['name' => 'employee']);

        // 2. Create the Shop Owner User
        $owner = User::create([
            'name' => 'Shop Owner',
            'email' => 'owner@comshop.com',
            'password' => Hash::make('password123'),
        ]);

        // 3. Assign the Role
        $owner->assignRole($ownerRole);

        // Optional: Create a Test Admin for your other routes
        $admin = User::create([
            'name' => 'System Admin',
            'email' => 'admin@comshop.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole($adminRole);
        
        $this->command->info('Roles and Users seeded successfully!');
    }
}