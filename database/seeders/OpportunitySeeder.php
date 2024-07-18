<?php

namespace Database\Seeders;

use App\Models\Opportunity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x = 1;

        while ($x < 20) {

            Opportunity::create([
                "name" => "Demo-Opportunity-" . $x,
                "user_id" => 1,
                "sector_id" => 1,
                "notes" => ["1", "2", "3"],
                "cities" => ["1", "2", "3"],
                "units" => ["1", "2", "3"],
                "address" => "Address Demo Here",
                "method" => "amounts_table",
                "file_opportunity" => "",
                "closing_date" => "2024-16-7",
                "manager" => "Demo Manager",
                "phone" => "059" . random_int(1111111, 9999999),
                "email" => "demo-" . $x . "@gmail.com",
                "status" => "active",
            ]);

            $x = $x  + 1;
        }
    }
}
