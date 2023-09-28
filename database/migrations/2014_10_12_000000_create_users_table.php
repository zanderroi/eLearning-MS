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
            $table->string('name');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->enum('sex', ['male', 'female']);
            $table->date('birthday');
            $table->string('address');
            $table->string('accountStatus')->nullable();
            $table->string('email')->unique();
            $table->unsignedBigInteger('contact_number');
            $table->enum('user_type', ['student', 'teacher', 'admin'])->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('contactperson');
            $table->unsignedBigInteger('contactperson_number');
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
