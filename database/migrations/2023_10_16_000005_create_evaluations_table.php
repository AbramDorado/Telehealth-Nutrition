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
            $table->string('question1')->nullable();
            $table->string('question2')->nullable();
            $table->text('question2_1')->nullable();
            $table->string('question3')->nullable();
            $table->string('question3_1')->nullable();
            $table->string('question3_2')->nullable();
            $table->string('question3_3')->nullable();
            $table->string('question3_4')->nullable();
            $table->string('question3_5')->nullable();
            $table->string('question3_6')->nullable();
            $table->string('question3_7')->nullable();
            $table->string('question3_8')->nullable();
            $table->string('question3_9')->nullable();
            $table->string('question3_10')->nullable();
            $table->string('question3_11')->nullable();
            $table->string('question3_12')->nullable();
            $table->string('question3_13')->nullable();
            $table->text('question3_14')->nullable();
            $table->string('question4')->nullable();
            $table->text('question4_1')->nullable();
            $table->string('question5')->nullable();
            $table->text('question5_1')->nullable();
            $table->string('question6')->nullable();
            $table->text('question7')->nullable();
            
            $table->boolean('is_archived')->default(false);
            $table->unsignedInteger('code_number')->nullable();

            $table->foreign('code_number')->references('code_number')->on('code_blue_activations')->onDelete('cascade'); // This line adds ON DELETE CASCADE
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
