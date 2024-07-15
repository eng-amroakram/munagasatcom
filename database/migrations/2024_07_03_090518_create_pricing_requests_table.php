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
        Schema::create('pricing_requests', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->longText('info');
            $table->string('file_pricing_request');
            $table->string('duration');
            $table->timestamp('deadline_submitting_offers')->nullable();
            $table->timestamp('closing_date')->nullable();
            $table->string('question');

            $table->string('email')->unique();
            $table->string('phone')->unique();

            $table->enum('is_visit', ['no', 'yes']);
            $table->enum('is_sample', ['no', 'yes']);
            $table->enum('status', ['active', 'inactive']);

            $table->foreignId('sector_id')->nullable()->constrained('sectors')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->json('services');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_requests');
    }
};
