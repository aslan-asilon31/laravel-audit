<?php

namespace Database\Seeders;

use App\Models\ModelHasRole;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ModelHasRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Get or create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $superadminRole = Role::firstOrCreate(['name' => 'superadmin']);
        $customerRole = Role::firstOrCreate(['name' => 'customer']);

        // Get existing users (assuming users with these emails already exist)
        $adminUser = User::where('email', 'aslanadmin@gmail.com')->first();
        $managerUser = User::where('email', 'aslanmanager@gmail.com')->first();
        $superadminUser = User::where('email', 'aslansuperadmin@gmail.com')->first();
        $customerUser = User::where('email', 'aslancustomer@gmail.com')->first();

        // Assign roles manually using random ID generation for model_has_roles
        $this->assignRoleToUser($adminRole, $adminUser);
        $this->assignRoleToUser($managerRole, $managerUser);
        $this->assignRoleToUser($superadminRole, $superadminUser);
        $this->assignRoleToUser($customerRole, $customerUser);
    }

    /**
     * Assign a role to a user and insert into model_has_roles table.
     *
     * @param  Role  $role
     * @param  User  $user
     * @return void
     */
    private function assignRoleToUser($role, $user)
    {
        // Check if the user exists before assigning
        if ($user) {
            // Create a random ID for the model_has_roles pivot table
            $randomId = Str::uuid();  // Generates a random UUID as ID

            // Insert into the model_has_roles table
            ModelHasRole::create([
                'role_id' => $role->id,
                'model_id' => $user->id,
                'model_type' => 'App\Models\User', // Set model type for User
            ]);
        }
    }
}
