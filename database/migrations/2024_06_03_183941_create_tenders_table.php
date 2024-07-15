<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();

            #Basic Data
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->string('reference_code')->unique();
            $table->text('purpose');
            $table->foreignId('tender_type_id')->nullable()->constrained("tender_types")->nullOnDelete();
            $table->foreignId('government_broker_id')->nullable()->constrained("government_brokers")->nullOnDelete();
            $table->json('cities');
            $table->json('activities');
            $table->json('tags');
            $table->enum('status', ['active', 'inactive']);

            #Contract Data
            $table->string('bid_book')->nullable(); #PDF File Path
            $table->string('actual_bid_book_price'); #Number
            $table->string('bid_book_download_price'); #Number
            $table->string('additional_instructions_file')->nullable(); #PDF File Path

            #Location Data
            $table->string('submission_location');
            $table->string('envelope_opening_location');
            $table->string('execution_location');
            $table->timestamp('adding_date')->nullable();
            $table->timestamp('last_inquiry_date')->nullable();
            $table->timestamp('last_submission_date')->nullable();
            $table->timestamp('envelope_opening_date_time')->nullable();
            $table->text('news')->nullable();

            #Bond & Construction Data
            $table->string('bid_bond')->nullable(); //الضمان الاجتماعي
            $table->string('bid_bond_address')->nullable(); //عنوان الضمان الاجتماعي
            $table->string('construction_work')->nullable(); //اعمال الانشاء
            $table->string('maintenance_work')->nullable(); //اعمال الصيانة

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};
