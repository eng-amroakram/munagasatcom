<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => "Service-" . 1,
            'sector_id' => 1,
            'status' => "active"
        ]);

        Service::create([
            'name' => "Service-" . 2,
            'sector_id' => 1,
            'status' => "active"
        ]);

        Service::create([
            'name' => "Service-" . 3,
            'sector_id' => 1,
            'status' => "active"
        ]);

        $x = 4;

        while ($x < 10) {
            Service::create([
                'name' => "Service-" . $x,
                'sector_id' => random_int(1, 4),
                'status' => "active"
            ]);

            $x = $x + 1;
        }
    }
}
