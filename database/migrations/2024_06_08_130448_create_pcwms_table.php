<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcwmsTable extends Migration
{
    public function up()
    {
        Schema::create('pcwms', function (Blueprint $table) {
            $table->id('pcwm1_id');
            $table->string('patient_name_2')->nullable();
            $table->unsignedInteger('age_3')->nullable();
            $table->string('prescribe_exer')->nullable();
            $table->decimal('target_weight_2', 3, 1)->nullable();
            $table->date('target_date')->nullable();
            $table->decimal('starting_weight', 3, 1)->nullable();
            $table->date('starting_date')->nullable();
            $table->string('weighing_day')->nullable();
            $table->time('weighing_time')->nullable();
            $table->dateTime('pcwm2_dt')->nullable();
            $table->decimal('actual_weekly_weight', 3, 1)->nullable();
            $table->decimal('loss', 3, 1)->nullable();
            $table->decimal('gain', 3, 1)->nullable();

            $table->boolean('is_archived')->default(false);
            $table->unsignedInteger('patient_number')->nullable();

            $table->foreign('patient_number')->references('patient_number')->on('patient_information')->onDelete('cascade'); // This line adds ON DELETE CASCADE
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pcwms');
    }
}
