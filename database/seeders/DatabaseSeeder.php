<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            GovernmentBrokerSeeder::class,
            CitySeeder::class,
            ActivitySeeder::class,
            TagSeeder::class,
            TenderTypeSeeder::class,
            SectorSeeder::class,
            ServiceSeeder::class,
            CenterSeeder::class,
            TenderSeeder::class,
            OpportunityNoteSeeder::class,
            UnitSeeder::class
        ]);
    }
}
