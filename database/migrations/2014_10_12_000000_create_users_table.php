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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_owner_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('photo')->nullable();
            $table->string('password');
            $table->enum('account_type', ['superadmin', 'admin', 'person', 'company', 'employee']);
            $table->enum('account_status', ['active', 'inactive', 'blocked']);

            $table->boolean('sms_verified')->nullable()->default(false);
            $table->integer('verification_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->json('permissions');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
