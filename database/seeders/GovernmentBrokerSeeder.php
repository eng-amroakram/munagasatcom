<?php

namespace Database\Seeders;

use App\Models\GovernmentBroker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernmentBrokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x = 1;

        while ($x < 9) {

            GovernmentBroker::create([
                'name' => 'Demo-Government-Broker-' . $x,
                'photo' => '',
                'status' => 'active',
            ]);

            $x = $x + 1;
        }
    }
}
