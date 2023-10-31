<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlowsheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flowsheets', function (Blueprint $table) {
            $table->increments('flowsheet_id');
            $table->dateTime('log_time');
            $table->string('breathing')->nullable();
            $table->string('pulse')->nullable();
            $table->unsignedInteger('bp_systolic')->nullable();
            $table->unsignedInteger('bp_diastolic')->nullable();
            $table->string('rhythm_on_check')->nullable();
            $table->string('rhythm_with_pulse')->nullable();
            $table->string('rhythm_intervention')->nullable();
            $table->unsignedInteger('joules')->nullable();
            $table->double('epinephrine_dose')->nullable();
            $table->string('epinephrine_route')->nullable();
            $table->double('amiodarone_dose')->nullable();
            $table->string('amiodarone_route')->nullable();
            $table->double('lidocaine_dose')->nullable();
            $table->string('lidocaine_route')->nullable();
            $table->string('free1_label')->nullable();
            $table->double('free1_dose')->nullable();
            $table->string('free1_route')->nullable();
            $table->string('free2_label')->nullable();
            $table->double('free2_dose')->nullable();
            $table->string('free2_route')->nullable();
            $table->text('comments')->nullable();
            $table->unsignedInteger('code_number')->nullable();

            $table->foreign('code_number')->references('code_number')->on('code_blue_activations');
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
        Schema::dropIfExists('flowsheets');
    }
}
