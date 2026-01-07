<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Module;
use App\Models\Permission;
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
        Customer::factory()->count(10)->create();

        Module::factory()->createMany([
            ['name' => 'Customer', 'description' => 'Customer module'],
            ['name' => 'Transaction', 'description' => 'Transaction module such as withdraw,deposit etc'],
        ]);

        Permission::factory()->createMany([
            ['name' => 'Customer_create', 'route' => '/customer', 'module_id' => 1],
            ['name' => 'Customer_view', 'route' => '/customers', 'module_id' => 1],
            ['name' => 'Transaction_create', 'route' => '/transactions', 'module_id' => 2],
            ['name' => 'Loan_create', 'route' => '/loans/create', 'module_id' => 2],
        ]);
    }
}
