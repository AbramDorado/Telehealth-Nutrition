<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_information', function (Blueprint $table) {
            $table->bigIncrements('patient_number');
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('sex')->nullable();
            $table->string('civil_status')->nullable();
            $table->date('birthday')->default(date("Y-m-d"))->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->text('allergies')->nullable();
            $table->string('position')->nullable();
            $table->string('unit_assignment')->nullable();
            $table->string('home_address')->nullable();
            $table->string('bachelor_degree')->nullable();
            $table->date('date_entered_service')->default(date("Y-m-d"))->nullable();
            $table->string('blood_type')->nullable();
            $table->string('religion')->nullable();
            $table->unsignedInteger('contact_number')->nullable();
            $table->unsignedInteger('referral_control_num')->nullable();
            $table->string('general_appearance')->nullable();
            $table->string('skin')->nullable();
            $table->string('heent')->nullable();
            $table->string('neck')->nullable();
            $table->string('chest')->nullable();
            $table->string('heart')->nullable();
            $table->string('breast')->nullable();
            $table->string('abdomen')->nullable();
            $table->string('musculoskeletal')->nullable();
            $table->string('neurologic')->nullable();
            $table->json('past_medical_history')->nullable();
            $table->string('operations')->nullable();
            $table->string('previous_hospitalization')->nullable();
            $table->string('current_medication')->nullable();
            $table->string('family_history')->nullable();
            $table->string('psychosocial_history')->nullable();
            $table->string('obstetric_score')->nullable();
            $table->string('lmp')->nullable();
            $table->string('menarche')->nullable();

            $table->boolean('is_archived')->default(false);
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
        Schema::dropIfExists('patient_information');
    }
}
