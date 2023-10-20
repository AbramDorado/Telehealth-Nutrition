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
            $table->string('outcome')->nullable();
            $table->dateTime('death_dt')->nullable();
            $table->unsignedInteger('bp_systolic')->nullable();
            $table->unsignedInteger('bp_diastolic')->nullable();
            $table->unsignedInteger('heart_rate')->nullable();
            $table->unsignedInteger('respiratory_rate')->nullable();
            $table->string('rhythm')->nullable();
            $table->dateTime('code_end_dt')->default(now());
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
        Schema::dropIfExists('outcomes');
    }
}
