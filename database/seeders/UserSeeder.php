<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['username' => 'admin', 'email' => 'info@admin.com'],
            ['name' => 'Admin', 'password' => 'Pr@x!-786']
        );

        $user->syncRoles(['Super Admin']);

        $user = Customer::updateOrCreate(
            ['email' => 'info@customer.com'],
            ['name' => 'Customer', 'password' => 'Pr@x!-786']
        );
    }
}
