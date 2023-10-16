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
            $table->dateTime('time')->default(now());
            $table->string('breathing');
            $table->string('pulse');
            $table->unsignedInteger('bp_systolic');
            $table->unsignedInteger('bp_diastolic');
            $table->string('rhythm_on_check');
            $table->string('rhythm_with_pulse');
            $table->string('rhythm_intervention');
            $table->double('epinephrine_dose');
            $table->string('epinephrine_route');
            $table->double('amiodarone_dose');
            $table->string('amiodarone_route');
            $table->double('lidocaine_dose');
            $table->string('lidocaine_route');
            $table->double('free1_dose');
            $table->string('free1_route');
            $table->double('free2_dose');
            $table->string('free2_route');
            $table->text('comments');

            $table->unsignedInteger('code_number');
            

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
