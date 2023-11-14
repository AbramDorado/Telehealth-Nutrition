<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('code_number');
            $table->string('role')->nullable();
            $table->string('password')->nullable();

            // Composite primary key
            $table->primary(['id', 'code_number']);

            // Foreign key references
            $table->foreign('id')->references('id')->on('users');
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
        Schema::dropIfExists('roles');
    }
}
