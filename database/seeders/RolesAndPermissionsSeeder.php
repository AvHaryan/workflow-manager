<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        Permission::create(['name' => 'view salaries']);
        Permission::create(['name' => 'edit salaries']);
        Permission::create(['name' => 'view vacation days']);
        Permission::create(['name' => 'view all users']);

        $adminRole->givePermissionTo(['view salaries', 'edit salaries', 'view vacation days', 'view all users']);
        $userRole->givePermissionTo(['view salaries', 'view vacation days']);
    }
}
