<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat role admin dan operator
        $super_admin = Role::updateOrCreate(['name' => 'Super Admin']);
        $admin = Role::updateOrCreate(['name' => 'Admin']);

        // Memberikan semua permission kepada role admin
        $super_admin->givePermissionTo(Permission::all());

        // Memberikan permission tertentu kepada role operator
        $admin->givePermissionTo(['show users', 'add datasims', 'edit datasims', 'delete datasims','show datasims','add datasirs', 'edit datasirs', 'delete datasirs','show datasirs', 'add datasios', 'edit datasios', 'delete datasios','show datasios']);
    }
}
