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
        Schema::create('express_client_admins', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->default('https://ui-avatars.com/api/?name=Test');
            $table->string('organisation_name')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('forgot_password')->nullable();
            $table->string('omr_client_id');
            $table->integer('total_available_licenses')->default(0)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('express_client_admins');
    }
};
