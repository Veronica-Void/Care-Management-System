<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRostersTable extends Migration
{
    public function up()
    {
        Schema::create('rosters', function (Blueprint $table) {
            $table->id();
            $table->string('supervisor_name');
            $table->string('doctor_name');
            $table->string('caregiver_name');
            $table->string('group');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rosters');
    }
}
