<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcomes', function (Blueprint $table) {
            $table->id('outcome_id');
            $table->string('outcome');
            $table->dateTime('death_dt');
            $table->text('assessment');
            $table->unsignedInteger('bp_systolic');
            $table->unsignedInteger('bp_diastolic');
            $table->unsignedInteger('heart_rate');
            $table->unsignedInteger('respiratory_rate');
            $table->string('rhythm');
            $table->dateTime('code_end_dt')->default(now());
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
        Schema::dropIfExists('outcomes');
    }
}
