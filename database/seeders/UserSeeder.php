<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $customerRole = Role::firstOrCreate(['name' => 'customer']);

        // 2. Buat user admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@mysetup.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('password123'),
            ]
        );

        // Assign role ke admin
        $admin->assignRole($adminRole);

        // 3. Buat user customer
        $customer = User::firstOrCreate(
            ['email' => 'customer@mysetup.com'],
            [
                'name' => 'customer',
                'password' => Hash::make('password123'),
            ]
        );

        // Assign role ke customer
        $customer->assignRole($customerRole);
    }
}
