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
        Schema::create('centers', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->foreignId('user_id')->nullable()->constrained("users")->nullOnDelete();
            $table->foreignId('city_id')->nullable()->constrained("cities")->nullOnDelete();
            $table->foreignId('sector_id')->nullable()->constrained("sectors")->nullOnDelete();
            $table->json('services');

            #Contacts
            $table->string('mobile')->unique();
            $table->string('telephone')->unique();
            $table->string('email')->unique();

            $table->string('address');

            $table->string('facebook')->unique();
            $table->string('twitter')->unique();
            $table->string('linkedin')->unique();

            $table->string('logo');
            $table->string('profile');

            $table->enum('status', ['active', 'inactive']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centers');
    }
};
