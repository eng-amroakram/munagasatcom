<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x = 1;

        while ($x < 9) {

            City::create([
                'name' => 'Demo-City-' . $x,
                'status' => 'active',
            ]);

            $x = $x + 1;
        }
    }
}
