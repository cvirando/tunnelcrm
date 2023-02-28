<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view dashboard', 'module' => 'Admin']);
        Permission::create(['name' => 'manage modules', 'module' => 'Admin']);
        Permission::create(['name' => 'manage users', 'module' => 'Admin']);
        Permission::create(['name' => 'update profile', 'module' => 'Admin']);
        Permission::create(['name' => 'manage roles', 'module' => 'Admin']);
        Permission::create(['name' => 'manage permissions', 'module' => 'Admin']);

        $role = Role::create(['name' => 'staff']);
        $role->givePermissionTo([
            'view dashboard',
            'update profile',
        ]);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
