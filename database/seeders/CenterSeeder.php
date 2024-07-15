<?php

namespace Database\Seeders;

use App\Models\Center;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x = 1;

        while ($x < 9) {

            Center::create([
                "name" => "center-" . $x,
                "user_id" => 4,
                "city_id" => 1,
                "sector_id" => 1,
                "services" => json_encode([1]),
                "mobile" => "059" . random_int(1111111, 9999999),
                "telephone" => random_int(11111111, 99999999),
                "email" => "center" . $x . "@gmail.com",
                "address" => "address",
                "facebook" => "facebook" . $x . ".com",
                "twitter" => "twitter" . $x . ".com",
                "linkedin" => "linkedin" . $x . ".com",
                "logo" => "",
                "profile" => "",
                "status" => "active",
            ]);

            $x = $x + 1;
        }
    }
}
