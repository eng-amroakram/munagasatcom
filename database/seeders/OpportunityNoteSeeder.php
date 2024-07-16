<?php

namespace Database\Seeders;

use App\Models\OpportunityNote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OpportunityNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notes = [
            "يجب الحضور للموقع للمعاينة و الاستلام",
            "يجب الحضور للاستلام",
            "يجب ان يكون المنتج اصلي",
            "يجب اضافة معلومات تفصيلية للمنتج و الخدمة",
            "يجب ارفاق صورة موقعه و مختومة على عرض السعر",
            "يرجى تقديم العرض باللغة العربية",
            "يرجى تقديم العرض باللغة الانجليزية",
            "يرجى تقديم عينات",
            "يرجى تعبئة الكراسة و ختمها من قبل المنشاة و اعادة رفعها مرة اخرى",
        ];


        foreach ($notes as $note) {
            OpportunityNote::create([
                "name" => $note,
                "status" => "Active"
            ]);
        }
    }
}
