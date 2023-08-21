<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Create roles
        // $role = Role::create(['name' => 'SuperAdmin']);

        // // Create Permistions
        // $permission = Permission::create(['name' => 'add post']);
        // $permission = Permission::create(['name' => 'edit post']);
        // $permission = Permission::create(['name' => 'update post']);
        // $permission = Permission::create(['name' => 'delete post']);

        // Get the authenticated user
        $user = Auth::user();

        // Find the 'admin' role
        $adminRole = Role::findByName('admin');

        // Assign the 'admin' role to the user
        $user->assignRole($adminRole);
        
       
    }
}
