<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ResourceCategorySeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('resource_categories')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('resource_categories')->insert([
            ['id' => 1, 'name' => 'Serveur'],
            ['id' => 2, 'name' => 'Réseau'],
            ['id' => 3, 'name' => 'Composant'],
            ['id' => 4, 'name' => 'Stockage'],
        ]);
    }
}
