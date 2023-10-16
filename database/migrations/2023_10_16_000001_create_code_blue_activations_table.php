<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeBlueActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_blue_activations', function (Blueprint $table) {
            $table->increments('code_number'); 
            $table->dateTime('code_start_dt');
            $table->dateTime('arrest_dt');
            $table->string('reason_for_activation');
            $table->string('initial_reporter');
            $table->dateTime('code_team_arrival_dt');
            $table->dateTime('e-cart_arrival_time');
            $table->string('witnessed');
            $table->unsignedInteger('patient_pin');

            $table->foreign('patient_pin')->references('patient_pin')->on('patients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('code_blue_activations');
    }
}
