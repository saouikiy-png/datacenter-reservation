<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resource;

class UpdateResourceSpecsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            'HPE ProLiant MicroServer Gen10 Plus' => [
                'cpu' => 'Intel Xeon E-2224 (3.4GHz)',
                'ram' => '16GB DDR4 ECC',
                'storage' => '1TB HDD',
                'bandwidth' => '1Gbps Ethernet',
                'os' => 'No OS / Linux Ready',
                'location' => 'Rack A1 - Server Room',
            ],
            'Cisco Business 250 Switch' => [
                'cpu' => 'ARM Cortex-A9 (800MHz)',
                'ram' => '512MB',
                'storage' => '256MB Flash',
                'bandwidth' => '10Gbps Switching Capacity',
                'os' => 'Cisco IOS',
                'location' => 'Network Cabinet 2',
            ],
            'TP-Link Omada ER605' => [
                'cpu' => 'MIPS 64-bit Network Processor',
                'ram' => '256MB DDR3',
                'storage' => 'N/A (Firmware)',
                'bandwidth' => '1Gbps VPN Throughput',
                'os' => 'Omada SDN',
                'location' => 'Gateway Node 1',
            ],
            'AMD Ryzen 5 5600G' => [
                'cpu' => '6 Cores / 12 Threads (3.9GHz)',
                'ram' => 'Supports up to 128GB',
                'storage' => 'N/A (Processor)',
                'bandwidth' => 'PCIe 3.0',
                'os' => 'Windows 11 / Linux Compatible',
                'location' => 'Component Storage',
                'status' => 'available' // Ensure status is set
            ],
            'Crucial RAM DDR4 16GB' => [
                'cpu' => 'N/A',
                'ram' => '16GB DDR4-3200',
                'storage' => 'N/A',
                'bandwidth' => '25.6 GB/s',
                'os' => 'N/A',
                'location' => 'Component Storage',
            ],
            'SanDisk Extreme Portable' => [
                'cpu' => 'N/A',
                'ram' => 'N/A',
                'storage' => '1TB NVMe SSD',
                'bandwidth' => '1050MB/s Read',
                'os' => 'ExFAT Pre-formatted',
                'location' => 'Portable Asset Locker',
            ],
            // Generic Fallbacks for any others found matching patterns
            'Serveur physique' => [
                'cpu' => 'Intel Xeon Gold',
                'ram' => '64GB',
                'storage' => '4TB RAID 10',
                'bandwidth' => '10Gbps',
                'os' => 'Ubuntu 22.04 LTS',
                'location' => 'Data Hall 1',
            ]
        ];

        foreach ($products as $name => $specs) {
            // Find by name matching or partial
            // We use 'like' to catch variations if exact match fails
            $resources = Resource::where('name', 'LIKE', "%{$name}%")->get();

            foreach ($resources as $resource) {
                $resource->update($specs);
            }
        }
        
        // Also ensure ANY resource with null values gets some generic "High Performance" filler
        // to absolutely guarantee no "N/A" is shown for demo purposes
        Resource::whereNull('cpu')->update(['cpu' => 'Generic High Perf CPU']);
        Resource::whereNull('ram')->update(['ram' => '8GB - 32GB Dynamic']);
        Resource::whereNull('bandwidth')->update(['bandwidth' => '1Gbps Unmetered']);
        Resource::whereNull('os')->update(['os' => 'Linux / Windows']);
        Resource::whereNull('location')->update(['location' => 'Main Data Center']);
    }
}
