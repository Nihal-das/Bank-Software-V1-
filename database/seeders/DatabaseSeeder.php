<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Customer::factory()->count(20)->create();

        RolePermission::factory()->createMany([
            ['role_id' => 1, 'permission_id' => 1],
            ['role_id' => 1, 'permission_id' => 2],
            ['role_id' => 1, 'permission_id' => 3],
            ['role_id' => 1, 'permission_id' => 4],
            ['role_id' => 1, 'permission_id' => 5],
            ['role_id' => 1, 'permission_id' => 6],
            ['role_id' => 1, 'permission_id' => 7],
            ['role_id' => 1, 'permission_id' => 8],
            ['role_id' => 1, 'permission_id' => 9],
            ['role_id' => 1, 'permission_id' => 10],
            ['role_id' => 1, 'permission_id' => 11],
            ['role_id' => 1, 'permission_id' => 12],
            ['role_id' => 1, 'permission_id' => 13],
            ['role_id' => 1, 'permission_id' => 14],
            ['role_id' => 1, 'permission_id' => 15],
            ['role_id' => 1, 'permission_id' => 16],
        ]);

        Role::factory()->createMany([
            ['name' => 'ADMIN', 'description' => 'Admin with full access'],
            ['name' => 'MANAGER', 'description' => 'Manager of the branch'],
            ['name' => 'STAFF', 'description' => 'Staff works in the branch'],
        ]);

        Module::factory()->createMany([
            ['name' => 'Customer', 'description' => 'Customer module'],
            ['name' => 'Transaction', 'description' => 'Transaction module such as withdraw,deposit etc'],
            ['name' => 'Role', 'description' => 'Role management module'],
            ['name' => 'User', 'description' => 'User management module'],
        ]);

        Permission::factory()->createMany([
            ['name' => 'Customer create', 'route' => '/customer', 'type' => 1, 'module_id' => 1],
            ['name' => 'Customer view', 'route' => '/customers', 'type' => 1, 'module_id' => 1],
            ['name' => 'Customer delete', 'route' => '/customer/{customer}/delete', 'type' => 2, 'module_id' => 1],
            ['name' => 'Transaction create', 'route' => '/transactions', 'type' => 1, 'module_id' => 2],
            ['name' => 'Loan create', 'route' => '/loans/create', 'type' => 1, 'module_id' => 2],
            ['name' => 'Loan repay', 'route' => '/loans/repay', 'type' => 1, 'module_id' => 2],
            ['name' => 'High Deposit', 'route' => 'high-deposit', 'type' => 3, 'module_id' => 2],
            ['name' => 'Role view', 'route' => '/roles/view-all', 'module_id' => 3],
            ['name' => 'Role create', 'route' => '/roles/create', 'module_id' => 3],
            ['name' => 'Role delete', 'route' => '/roles/delete', 'type' => 2, 'module_id' => 3],
            ['name' => 'Role update', 'route' => '/roles/edit/{role}', 'type' => 1, 'module_id' => 3],
            ['name' => 'User view', 'route' => '/users/show-all', 'type' => 1, 'module_id' => 4],
            ['name' => 'User create', 'route' => '/user/create', 'type' => 1, 'module_id' => 4],
            ['name' => 'User delete', 'route' => '/user/delete', 'type' => 1,   'module_id' => 4],
            ['name' => 'User dashboard', 'route' => '/dashboard', 'type' => 1,   'module_id' => 4],
            ['name' => 'Image Upload', 'route' => '/images', 'type' => 1,   'module_id' => 4],
        ]);
    }
}
