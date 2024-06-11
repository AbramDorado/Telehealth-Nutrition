<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcwmLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcwm_logs', function (Blueprint $table) {
            $table->id('pcwm_logs_id');
            $table->date('pcwm2_dt')->nullable();
            $table->decimal('actual_weekly_weight', 3, 1)->nullable();
            $table->decimal('loss', 3, 1)->nullable();
            $table->decimal('gain', 3, 1)->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('pcwm_id');
            $table->foreign('pcwm_id')->references('pcwm_id')->on('pcwms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pcwm_logs');
    }
}