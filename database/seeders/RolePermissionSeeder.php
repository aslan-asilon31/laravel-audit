<?php

// database/seeders/RolePermissionSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar permission yang berkaitan dengan ticketing dan CRM
        $permissions = [
            'create ticket',
            'view ticket',
            'update ticket',
            'delete ticket',
            'create customer',
            'view customer',
            'update customer',
            'delete customer',
            'assign ticket',
            'view crm dashboard',
            'generate crm report',
        ];

        // Membuat permission baru
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Role yang berkaitan dengan aplikasi umum
        $superadmin = Role::create(['name' => 'superadmin']);
        $admin = Role::create(['name' => 'admin']);
        $manager = Role::create(['name' => 'manager']);

        // Memberikan semua permissions kepada superadmin
        $superadmin->givePermissionTo(Permission::all());

        // Role admin dapat akses lebih terbatas tapi masih banyak fitur
        $admin->givePermissionTo([
            'create ticket',
            'view ticket',
            'update ticket',
            'delete ticket',
            'create customer',
            'view customer',
            'update customer',
            'delete customer',
            'assign ticket',
            'view crm dashboard',
            'generate crm report',
        ]);

        // Role manager memiliki akses terbatas hanya untuk tiket dan beberapa fitur CRM
        $manager->givePermissionTo([
            'view ticket',
            'create ticket',
            'update ticket',
            'view customer',
            'update customer',
            'assign ticket',
            'view crm dashboard',
        ]);
    }
}
