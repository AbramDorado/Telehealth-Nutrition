<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialResuscitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initial_resuscitations', function (Blueprint $table) {
            $table->increments('initial_resuscitation_id'); 
            $table->string('breathing_upon_ca');
            $table->dateTime('first_ventilation_dt')->default(now());
            $table->string('ventilation');
            $table->dateTime('intubation_dt')->default(now());
            $table->unsignedInteger('et_tube_size');
            $table->unsignedInteger('intubation_attempts');
            $table->string('et_tube_information');
            $table->text('first_documented_rhythm');
            $table->dateTime('first_pulseless_rhythm_dt')->default(now());
            $table->dateTime('compressions_time')->default(now());
            $table->string('aed_applied');
            $table->dateTime('aed_applied_dt')->default(now());
            $table->string('pacemaker_on');
            $table->dateTime('pacemaker_on_dt')->default(now());
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
        Schema::dropIfExists('initial_resuscitations');
    }
}
