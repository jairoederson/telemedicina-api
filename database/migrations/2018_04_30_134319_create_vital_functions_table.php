<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVitalFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vital_functions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('minimal_blood_pressure')->nullable();
            $table->string('maximum_blood_pressure')->nullable();
            $table->string('Breathing_frequency')->nullable();
            $table->string('heart_rate')->nullable();
            $table->string('temperature')->nullable();
            $table->string('weight')->nullable();
            $table->string('size')->nullable();
            $table->integer('query_id')->unsigned();

            $table->foreign('query_id')->references('id')->on('queries');

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
        Schema::dropIfExists('vital_functions');
    }
}
