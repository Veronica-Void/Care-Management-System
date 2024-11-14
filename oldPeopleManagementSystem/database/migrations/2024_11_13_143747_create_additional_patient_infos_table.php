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
        Schema::create('additional_patient_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_ID');
            $table->string('group');
            $table->date('admission_date');
            $table->string('patient_name');
            $table->foreign('patient_name')->references('f_name')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_patient_infos');
    }
};
