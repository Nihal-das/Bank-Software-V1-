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

        Role::factory()->createMany([
            ['name' => 'ADMIN', 'description' => 'Admin with full access'],
            ['name' => 'MANAGER', 'description' => 'Manager of the branch'],
            ['name' => 'STAFF', 'description' => 'Staff works in the branch'],
        ]);

        Module::factory()->createMany([
            ['name' => 'Customer', 'description' => 'Customer module', 'icon' => 'M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z', 'sort_order' => 1],
            ['name' => 'Transaction', 'description' => 'Transaction module such as withdraw,deposit etc', 'icon' => 'M15 8.25H9m6 3H9m3 6-3-3h1.5a3 3 0 1 0 0-6M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z', 'sort_order' => 2],
            ['name' => 'Role', 'description' => 'Role management module', 'icon' => 'M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z', 'sort_order' => 3],
            ['name' => 'User', 'description' => 'User management module', 'icon' => 'M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z', 'sort_order' => 4],
        ]);

        Permission::factory()->createMany([
            ['name' => 'Customer create', 'route' => '/customer', 'type' => 1, 'module_id' => 1, 'sort_order' => 1],
            ['name' => 'Customer view', 'route' => '/customers', 'type' => 1, 'module_id' => 1, 'sort_order' => 2],
            ['name' => 'Customer delete', 'route' => '/customer/{customer}/delete', 'type' => 2, 'module_id' => 1, 'sort_order' => 3],


            ['name' => 'Transaction create', 'route' => '/transactions', 'type' => 1, 'module_id' => 2, 'sort_order' => 1],
            ['name' => 'Loan create', 'route' => '/loans/create', 'type' => 1, 'module_id' => 2, 'sort_order' => 2],
            ['name' => 'Loan repay', 'route' => '/loans/repay', 'type' => 1, 'module_id' => 2, 'sort_order' => 3],
            ['name' => 'High Deposit', 'route' => 'high-deposit', 'type' => 3, 'module_id' => 2, 'sort_order' => 4],



            ['name' => 'Role view', 'route' => '/roles/view-all', 'type' => 1, 'module_id' => 3, 'sort_order' => 1],
            ['name' => 'Role create', 'route' => '/roles/create', 'type' => 1, 'module_id' => 3, 'sort_order' => 2],
            ['name' => 'Role delete', 'route' => '/roles/delete', 'type' => 2, 'module_id' => 3, 'sort_order' => 3],
            ['name' => 'Role update', 'route' => '/roles/edit/{role}', 'type' => 2, 'module_id' => 3, 'sort_order' => 4],



            ['name' => 'User view', 'route' => '/users/show-all', 'type' => 1, 'module_id' => 4, 'sort_order' => 1],
            ['name' => 'User create', 'route' => '/user/create', 'type' => 1, 'module_id' => 4, 'sort_order' => 2],
            ['name' => 'User dashboard', 'route' => '/dashboard', 'type' => 1,   'module_id' => 4, 'sort_order' => 3],
            ['name' => 'Image Upload', 'route' => '/images', 'type' => 1,   'module_id' => 4, 'sort_order' => 4],
            ['name' => 'User delete', 'route' => '/user/delete', 'type' => 2,   'module_id' => 4, 'sort_order' => 5],
        ]);
    }
}
