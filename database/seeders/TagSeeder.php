<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x = 1;

        while ($x < 9) {

            Tag::create([
                'name' => 'Demo-Tag-' . $x,
                'status' => 'active',
            ]);

            $x = $x + 1;
        }
    }
}
