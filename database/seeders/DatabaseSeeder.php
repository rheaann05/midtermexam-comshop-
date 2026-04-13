<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
       $adminRole = Role::firstOrCreate(['name' => 'admin']);
       $ownerRole = Role::firstOrCreate(['name' => 'owner']);
       $employeeRole = Role::firstOrCreate(['name' => 'employee']);

       $permissions = [
        'can_view_any',
        'can_view',
        'can_create',
        'can_update',
        'can_delete'
       ];

       foreach ($permissions as $permission) {
        Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
       }


       $adminRole->syncPermissions($permissions);
       $ownerRole->syncPermissions(['can_view', 'can_create', 'can_update']);
       $employeeRole->syncPermissions(['can_view_any', 'can_view']);

       $admin = User::firstOrCreate(['email' => 'admin@example.com'], ['name' => 'Admin User', 'password' => bcrypt('123123')]);
       $admin->assignRole($adminRole);
       $owner = User::firstOrCreate(['email' => 'owner@example.com'], ['name' => 'Owner User', 'password' => bcrypt('123123')]);
       $owner->assignRole($ownerRole);

       $employee = User::firstOrCreate(['email' => 'employee@example.com'], ['name' => 'Employee User', 'password' => bcrypt('123123')]);
       $employee->assignRole($employeeRole);
    }
}
