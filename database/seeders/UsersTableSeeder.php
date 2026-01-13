<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UsersTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('users')->insert([
            [

                'role_id' => 1, // user
                'name' => 'Test User ',
                'email' => 'user@test.com',
                'password' => Hash::make('password')
            ],
            [

                'role_id' => 1, // user
                'name' => 'Test User 2',
                'email' => 'user2@test.com',
                'password' => Hash::make('password')
            ],
            [

                'role_id' => 3, // admin
                'name' => 'Test Admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('password')
            ],
            [

                'role_id' => 2, // manager
                'name' => 'Test Manager',
                'email' => 'manager@test.com',
                'password' => Hash::make('password')
            ],
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role_id' => 1, // 1 = user
            'password' => bcrypt('password'), // always hash passwords
        ]);
    }
}
