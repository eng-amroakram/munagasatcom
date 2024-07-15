<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x = 1;

        while ($x < 9) {

            Activity::create([
                'name' => 'Demo-Activity-' . $x,
                'status' => 'active',
            ]);

            $x = $x + 1;
        }
    }
}
