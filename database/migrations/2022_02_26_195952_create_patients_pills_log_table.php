<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsPillsLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        /* 
          TODO: Update this table to have a new date column with default current date. 
          Combination of that date column and p_p_schedule_id should be the primary key.
        */
        Schema::create('patients_pills_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('p_p_schedule_id');
            $table->foreign('p_p_schedule_id')->references('id')->on('patients_pills_schedule');
            $table->enum('status', ['pending', 'postponed', 'taken'])->default('pending');
            $table->string('patient_log_uuid', 50);
            $table->timestamp('taken_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients_pills_log');
    }
}
