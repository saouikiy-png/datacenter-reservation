<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ResourcesSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('resources')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('resources')->insert([

            // SERVEURS
            [
                'name' => 'Dell PowerEdge T150',
                'category_id' => 1,
                'cpu' => null,
                'ram' => null,
                'storage' => 480,
                'bandwidth' => null,
                'os' => null,
                'location' => null,
                'status' => 'available',
            ],
            [
                'name' => 'HPE ProLiant MicroServer Gen10 Plus',
                'category_id' => 1,
                'cpu' => null,
                'ram' => null,
                'storage' => 2000,
                'bandwidth' => null,
                'os' => null,
                'location' => null,
                'status' => 'available',
            ],

            // RÉSEAU
            [
                'name' => 'Cisco Business 250 Switch',
                'category_id' => 2,
                'cpu' => null,
                'ram' => null,
                'storage' => null,
                'bandwidth' => 1000,
                'os' => null,
                'location' => null,
                'status' => 'available',
            ],
            [
                'name' => 'TP-Link Omada ER605',
                'category_id' => 2,
                'cpu' => null,
                'ram' => null,
                'storage' => null,
                'bandwidth' => null,
                'os' => null,
                'location' => null,
                'status' => 'available',
            ],

            // COMPOSANTS
            [
                'name' => 'AMD Ryzen 5 5600G',
                'category_id' => 3,
                'cpu' => null,
                'ram' => null,
                'storage' => null,
                'bandwidth' => null,
                'os' => null,
                'location' => null,
                'status' => 'available',
            ],
            [
                'name' => 'Crucial RAM DDR4 16GB',
                'category_id' => 3,
                'cpu' => null,
                'ram' => 16,
                'storage' => null,
                'bandwidth' => null,
                'os' => null,
                'location' => null,
                'status' => 'available',
            ],

            // STOCKAGE
            [
                'name' => 'Samsung T7 Shield',
                'category_id' => 4,
                'cpu' => null,
                'ram' => null,
                'storage' => 1000,
                'bandwidth' => null,
                'os' => null,
                'location' => null,
                'status' => 'available',
            ],
            [
                'name' => 'SanDisk Extreme Portable',
                'category_id' => 4,
                'cpu' => null,
                'ram' => null,
                'storage' => 2000,
                'bandwidth' => null,
                'os' => null,
                'location' => null,
                'status' => 'available',
            ],
        ]);
    }
}
