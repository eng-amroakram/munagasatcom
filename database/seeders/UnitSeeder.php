<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x = 1;

        $units = ['kg', 'cm', 'm', 'carton', 'd', 'meter', 'piece', 'roll'];

        while ($x < 10) {

            Unit::create([
                'name' => "Unit-Demo-" . $x,
                'unit' => $units[random_int(0, 7)],
                'amount'=> random_int(20, 100),
                'status' => 'active'
            ]);

            $x = $x + 1;
        }
    }
}
