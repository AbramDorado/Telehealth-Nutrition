<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_teams', function (Blueprint $table) {
            $table->id('code_team_id');
            $table->string('code_team_leader')->nullable();
            $table->string('code_team_co_leader')->nullable();
            $table->string('recorder')->nullable();
            $table->string('code_team_member')->nullable();
            $table->string('intubated_by')->nullable();

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
        Schema::dropIfExists('code_teams');
    }
}
