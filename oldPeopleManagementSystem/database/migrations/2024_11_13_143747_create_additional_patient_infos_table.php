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
            //need to add foreign key patient name ref users_table.f_name + users_table.l_name
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
