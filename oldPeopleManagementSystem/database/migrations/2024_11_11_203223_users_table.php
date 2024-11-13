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
            $table->string('role');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            $table->string('dob');
            $table->boolean('is_approved')->default(false); // New column for approval status
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
