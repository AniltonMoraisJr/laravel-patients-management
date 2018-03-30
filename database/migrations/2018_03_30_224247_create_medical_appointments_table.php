<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned()->nullable();
            $table->integer('patient_id')->unsigned()->nullable();
            $table->string('title');
            $table->datetime('start');
            $table->datetime('end');
            $table->timestamps();

            $table->foreign('doctor_id')->on('users')->references('id');
            $table->foreign('patient_id')->on('patients')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_appointments');
    }
}
