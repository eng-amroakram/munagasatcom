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
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('sector_id')->nullable()->constrained('sectors')->nullOnDelete();
            $table->json('notes');
            $table->json('cities');
            $table->json('units');
            $table->string('address');
            $table->enum('method', ['pdf_file', 'amounts_table']);
            $table->string('file_opportunity')->nullable();
            $table->timestamp('closing_date');
            $table->string('manager');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
