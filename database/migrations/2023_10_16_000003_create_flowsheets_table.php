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
            $table->dateTime('log_time');
            $table->dateTime('last_edited_time')->nullable();
            $table->string('breathing')->nullable();
            $table->string('pulse')->nullable();
            $table->unsignedInteger('bp_systolic')->nullable();
            $table->unsignedInteger('bp_diastolic')->nullable();
            $table->string('rhythm_on_check')->nullable();
            $table->string('rhythm_with_pulse')->nullable();
            $table->string('rhythm_intervention')->nullable();
            $table->unsignedInteger('joules')->nullable();
            $table->decimal('epinephrine_dose', 3, 1)->nullable();
            $table->string('epinephrine_route')->nullable();
            $table->decimal('amiodarone_dose', 3, 1)->nullable();
            $table->string('amiodarone_route')->nullable();
            $table->decimal('lidocaine_dose', 3, 1)->nullable();
            $table->string('lidocaine_route')->nullable();
            $table->string('free1_label')->nullable();
            $table->decimal('free1_dose', 3, 1)->nullable();
            $table->string('free1_route')->nullable();
            $table->string('free2_label')->nullable();
            $table->decimal('free2_dose', 3, 1)->nullable();
            $table->string('free2_route')->nullable();
            $table->text('comments')->nullable();
            
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
        Schema::dropIfExists('flowsheets');
    }
}
