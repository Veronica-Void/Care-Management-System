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
        Schema::create('patient_infos', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->integer('patient_id');
            $table->string('docs_name');
            $table->string('docs_appt');
            $table->string('caregiver_first');
            $table->string('caregiver_last');
            $table->integer('morning_meds');
            $table->integer('afternoon_meds');
            $table->integer('night_meds');
            $table->integer('breakfast');
            $table->integer('lunch');
            $table->integer('dinner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_infos');
    }
};
