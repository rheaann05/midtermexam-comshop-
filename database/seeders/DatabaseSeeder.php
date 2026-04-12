<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
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
