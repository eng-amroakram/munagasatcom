<?php

namespace Database\Seeders;

use App\Models\TenderType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x = 1;

        while ($x < 9) {

            TenderType::create([
                'name' => 'Demo-TenderType-' . $x,
                'status' => 'active',
            ]);

            $x = $x + 1;
        }
    }
}
