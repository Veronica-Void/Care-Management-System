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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id'); // should come from the additional patient info 
            $table->integer('total_due'); // should come from the patients table but for now hard code
            $table->date('start_date')->nullable();
            $table->integer('appointment_count')->default(0);
            $table->decimal('total_cost', 8, 2)->default(0.00);
            $table->integer('new_payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
