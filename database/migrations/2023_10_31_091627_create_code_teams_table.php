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
