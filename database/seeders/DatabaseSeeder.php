<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed d’abord les rôles
        $this->call([
            RolesTableSeeder::class,
        ]);

        // Seed ensuite les utilisateurs
        $this->call([
            UsersTableSeeder::class,
        ]);

        // Seed les ressources
        $this->call([
            ResourceCategorySeeder::class,
            ResourcesSeeder::class,
        ]);
    }
}

