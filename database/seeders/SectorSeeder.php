<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x = 1;

        while ($x < 5) {
            Sector::create([
                'name' => "Sector-" . $x,
                'status' => "active"
            ]);

            $x = $x + 1;
        }
    }
}
