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
            $table->unsignedInteger('code_number')->unique()->primary();
            $table->dateTime('code_start_dt')->nullable();
            $table->dateTime('arrest_dt')->nullable();
            $table->string('reason_for_activation')->nullable();
            $table->string('initial_reporter')->nullable();
            $table->dateTime('code_team_arrival_dt')->nullable();
            $table->dateTime('e_cart_arrival_dt')->nullable();
            $table->string('witnessed')->nullable();
            //$table->unsignedInteger('patient_pin');

            //$table->foreign('patient_pin')->references('patient_pin')->on('patients');
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
