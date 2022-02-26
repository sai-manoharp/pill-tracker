<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsPillsScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients_pills_schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pill_id');
            $table->unsignedBigInteger('patient_id');
            $table->enum('schedule', ['morining', 'afternoon', 'night']);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();            
            $table->foreign('pill_id')->references('id')->on('pills');
            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients_pills_schedule');
    }
}
