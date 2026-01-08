<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
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

        Role::factory()->createMany([
            ['name' => 'ADMIN', 'description' => 'Admin with full access'],
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
        ]);
    }
}
