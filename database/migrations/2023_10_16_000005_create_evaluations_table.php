<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id('evaluation_id');
            $table->string('question1');
            $table->string('question2');
            $table->text('question2_1');
            $table->string('question3');
            $table->string('question3_1');
            $table->string('question3_2');
            $table->string('question3_3');
            $table->string('question3_4');
            $table->string('question3_5');
            $table->string('question3_6');
            $table->string('question3_7');
            $table->string('question3_8');
            $table->string('question3_9');
            $table->string('question3_10');
            $table->string('question3_11');
            $table->string('question3_12');
            $table->string('question3_13');
            $table->text('question3_14');
            $table->string('question4');
            $table->text('question4_1');
            $table->string('question5');
            $table->text('question5_1');
            $table->string('question6');
            $table->text('question7');
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
        Schema::dropIfExists('evaluations');
    }
}
