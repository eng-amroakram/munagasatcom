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
        $cities = [
            "منطقة الرياض",
            "منطقة مكة المكرمة",
            "منطقة المدينة المنورة",
            "المنطقة الشرقية",
            "منطقة عسير",
            "منطقة جازان",
            "منطقة نجران",
            "منطقة الحدود الشمالية",
            "منطقة تبوك",
            "منطقة القصيم",
            "منطقة الباحة",
            "منطقة حائل",
            "منطقة الجوف",
            "خارج المملكة",
        ];


        foreach ($cities as $city) {
            City::create([
                'name' => $city,
                'status' => 'active',
            ]);
        }
    }
}
