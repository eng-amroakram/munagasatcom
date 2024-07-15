<?php

namespace Database\Seeders;

use App\Models\Tender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x = 1;

        while ($x < 100) {
            Tender::create([
                "name" => "Tender-" . $x,
                "code" => "CodeTender-" . $x,
                "reference_code" => "ReferenceCodeTender-" . $x,
                "purpose" => "Tender Tender Tender Tender Tender Tender Tender Tender Tender",
                "tender_type_id" => random_int(1, 8),
                "government_broker_id" => random_int(1, 8),
                "cities" => json_encode([1, 2, 3]),
                "activities" => json_encode([1, 2, 3]),
                "tags" => json_encode([1, 2, 3]),
                "status" => "active",
                "bid_book" => "",
                "actual_bid_book_price" => random_int(11111, 99999),
                "bid_book_download_price" => random_int(11111, 99999),
                "additional_instructions_file" => "",
                "submission_location" => "مكان افتتاح المظاريف",
                "envelope_opening_location" => "مكان افتتاح المظاريف",
                "execution_location" => "مكان تنفيذ الافتتاح",
                "adding_date" => "2024-07-16",
                "last_inquiry_date" => "2024-07-16",
                "last_submission_date" => "2024-07-16",
                "envelope_opening_date_time" => "2024-07-16",
                "news" => "News News News News News News News News News News News News",
                "bid_bond" => "الضمان الاجتماعي",
                "bid_bond_address" => "عنوان الضمان الاجتماعي",
                "construction_work" => "اعمال البناء",
                "maintenance_work" => "اعمال الصيانة",
            ]);

            $x = $x + 1;
        }
    }
}
