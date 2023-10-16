<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->unsignedInteger('patient_pin')->unique()->primary();
            $table->unsignedInteger('visit_number')->unique();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('suffix');
            $table->date('birthday')->default(date("Y-m-d"));
            $table->unsignedInteger('age');
            $table->string('sex');
            $table->double('height');
            $table->double('weight');
            $table->text('allergies');
            $table->string('location');

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
        Schema::dropIfExists('patients');
    }
}
