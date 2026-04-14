<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Roles
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $ownerRole = Role::firstOrCreate(['name' => 'owner', 'guard_name' => 'web']);
        $employeeRole = Role::firstOrCreate(['name' => 'employee', 'guard_name' => 'web']);

        // 2. Sync Permissions
        // Admin gets all permissions dynamically
        $adminRole->syncPermissions(Permission::all());

        // Owner can do everything except delete
        $ownerRole->syncPermissions(['can_view', 'can_create', 'can_update']);

        // Employee is mostly read-only
        $employeeRole->syncPermissions(['can_view_any', 'can_view']);
    }
}