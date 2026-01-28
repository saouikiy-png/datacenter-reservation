<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'user@test.com'],
            [
                'role_id' => 1,
                'name' => 'Test User',
                'password' => Hash::make('password')
            ]
        );

        User::firstOrCreate(
            ['email' => 'user2@test.com'],
            [
                'role_id' => 1,
                'name' => 'Test User 2',
                'password' => Hash::make('password')
            ]
        );

        User::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'role_id' => 3,
                'name' => 'Test Admin',
                'password' => Hash::make('password')
            ]
        );

        User::firstOrCreate(
            ['email' => 'manager@test.com'],
            [
                'role_id' => 2,
                'name' => 'Test Manager',
                'password' => Hash::make('password')
            ]
        );

        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'role_id' => 1,
                'name' => 'Test User Factory',
                'password' => Hash::make('password')
            ]
        );
    }
}




