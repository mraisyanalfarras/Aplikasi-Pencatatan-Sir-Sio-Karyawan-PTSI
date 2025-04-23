<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission untuk mengelola users
        Permission::updateOrCreate(['name' => 'show users']);
        Permission::updateOrCreate(['name' => 'add users']);
        Permission::updateOrCreate(['name' => 'edit users']);
        Permission::updateOrCreate(['name' => 'delete users']);

        // Permission untuk mengelola roles
        Permission::updateOrCreate(['name' => 'show roles']);
        Permission::updateOrCreate(['name' => 'add roles']);
        Permission::updateOrCreate(['name' => 'edit roles']);
        Permission::updateOrCreate(['name' => 'delete roles']);

      
      // Permission untuk mengelola datasios
        Permission::updateOrCreate(['name' => 'show datasios']);
        Permission::updateOrCreate(['name' => 'add datasios']);
        Permission::updateOrCreate(['name' => 'edit datasios']);
        Permission::updateOrCreate(['name' => 'delete datasios']);

        

        // Permission untuk mengelola datasim
        Permission::updateOrCreate(['name' => 'show datasims']);
        Permission::updateOrCreate(['name' => 'add datasims']);
        Permission::updateOrCreate(['name' => 'edit datasims']);
        Permission::updateOrCreate(['name' => 'delete datasims']);

        // Permission untuk mengelola Leave
        Permission::updateOrCreate(['name' => 'show datasirs']);
        Permission::updateOrCreate(['name' => 'add datasirs']);
        Permission::updateOrCreate(['name' => 'edit datasirs']);
        Permission::updateOrCreate(['name' => 'delete datasirs']);

        // Permission untuk mengelola presence
        Permission::updateOrCreate(['name' => 'show attendances']);
        Permission::updateOrCreate(['name' => 'add attendances']);
        Permission::updateOrCreate(['name' => 'edit attendances']);
        Permission::updateOrCreate(['name' => 'delete attendances']);

        
        // Permission tambahan
        Permission::updateOrCreate(['name' => 'manage-hr']);
        Permission::updateOrCreate(['name' => 'manage-attendances']);
        Permission::updateOrCreate(['name' => 'manage-users']);
        Permission::updateOrCreate(['name' => 'manage-roles']);
        Permission::updateOrCreate(['name' => 'manage-datasios']);
        Permission::updateOrCreate(['name' => 'manage-datasirs']);
        Permission::updateOrCreate(['name' => 'manage-datasims']);
    }
}
