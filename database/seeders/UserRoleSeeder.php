<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Fetch the max ID from the users table and increment it for the new user
        $maxId = DB::table('users')->max('id');

        // Create Customer User
        $customerUser = User::create([
            'id' => $maxId + 1, // Manually assign the incremented id
            'name' => 'Aslan Customer',
            'email' => 'aslancustomer@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Increment ID for the next user
        $maxId++;

        // Create Superadmin User
        $superAdminUser = User::create([
            'id' => $maxId + 1,
            'name' => 'Aslan Superadmin',
            'email' => 'aslansuperadmin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Increment ID for the next user
        $maxId++;

        // Create Admin User
        $adminUser = User::create([
            'id' => $maxId + 1,
            'name' => 'Aslan Admin',
            'email' => 'aslanadmin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Increment ID for the next user
        $maxId++;

        // Create Manager User
        $managerUser = User::create([
            'id' => $maxId + 1,
            'name' => 'Aslan Manager',
            'email' => 'aslanmanager@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
